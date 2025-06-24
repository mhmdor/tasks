@extends('layouts.app')


@section('content')


    <div class="latest pt-4 px-3 d-flex gap-3 mb-5">
        <div class="clients">

            <div id="formDiv">
                @include('categories.form')
            </div>

            <div id="recordsDiv">
                @include('categories.records')
            </div>

        </div>
    </div>




@endsection

@section('script')

    <script>

        $('#formDiv').submit(function (e) {
            e.preventDefault();

            $('.error').remove();

            let id = $('#id').val() || 'undefined';

            if (id !== 'undefined')
                update(id);
            else
                store();
        });

        function store() {
            $('.error').remove();

            let form = new FormData($('#formId')[0]);
            let url = '{{ route("categories.store") }}';
            $.ajax({

                headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
                type: 'POST', url: url, data: form,
                contentType: false, processData: false,

                success: function (result) {
                    records();
                    resetForm();
                    swal({
                        title: "{{ __('lng.done') }}",
                        type: "success",
                        timer: 2000,
                        showConfirmButton: true
                    });
                },

                error: function (errors) {
                    let errs = errors.responseJSON.errors;
                    $.each(errs, function (key, msg) {
                        $('#' + key).after('<small class="error text-danger">' + msg + '</small>');
                    });
                }

            });
        }

        function update(id) {
            let form = $('#formId').serialize();//new FormData($('#formId')[0]);
            let url = '{{ route("categories.update", ":id") }}';
            url = url.replace(':id', id);
            $.ajax({

                headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
                type: 'PUT', url: url, data: form,

                success: function (result) {
                    records();
                    resetForm();
                    swal({
                        title: "{{ __('lng.done') }}",
                        type: "success",
                        timer: 2000,
                        showConfirmButton: true
                    });
                },

                error: function (errors) {
                    console.log(errors.responseJSON.errors);
                }

            });
        }

        function records() {
            let url = '{{ route("categories.records") }}';

            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                type: 'GET',
                url: url,

                success: function (result) {
                    $('#recordsDiv').html(result);


                    const modalElement = document.getElementById('exampleModalLong');
                    const modalInstance = bootstrap.Modal.getInstance(modalElement) || new bootstrap.Modal(modalElement);


                    document.activeElement.blur();

                    modalInstance.hide();

                    const backdrop = document.querySelector('.modal-backdrop');
                    if (backdrop) {
                        backdrop.remove();
                        document.body.classList.remove('modal-open');
                    }
                }
            });
        }

        function edit(id) {
            resetForm();
            let url = '{{ route("categories.edit", ":id") }}';
            url = url.replace(':id', id);
            $.ajax({

                headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
                type: 'GET', url: url,

                success: function (result) {

                    $("#exampleModalLong").modal('show');

                    $.each(result, function (key, value) {
                        if (key === 'required' && value)
                            $('#' + key).prop('checked', true);
                        else
                            $('#' + key).val(value);
                    });

                }

            });
        }

        function destroy(id) {

            swal({
                title: "Sure Delete ?",
                text: "",
                type: "warning",
                showCancelButton: true,
                confirmButtonColor: "#DD6B55",
                confirmButtonText: "Confirm",
                cancelButtonText: "Cancel",
                closeOnConfirm: false,
                closeOnCancel: false
            }, function (isConfirm) {
                if (isConfirm) {


                    let url = '{{ route("categories.destroy", ":id") }}';
                    url = url.replace(':id', id);
                    $.ajax({

                        headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
                        type: 'delete', url: url,

                        success: function (result) {
                            resetForm();
                            $('.error').remove();
                            records();

                            swal({
                                title: "Delete",
                                                                                    {{--                        text: "{{ __('lng.DeletedMEG') }}", --}
                    }
                                                                                    type: "success",
                        timer: 500,
                        showConfirmButton: false
                                                                                });

        },
        error: function (error) {
            swal({
                title: "{{ __('lng.RelationConnected') }}",
                                                                                    {{--                                text: "{{ __('lng.RelationConnectedMSG') }}", --}}
        type: "error",
            timer: 2000,
                showConfirmButton: true
                                                                                });
                                                                            }

                                                                        });


                                                                    } else {
            swal({
                title: "{{ __('lng.Cancelled') }}",
                                                                            {{--                        text: "{{ __('lng.CancelledMEG') }}", --}}
        type: "error",
            timer: 500,
                showConfirmButton: false
                                                                        });
                                                                    }

                                                                });


                                                            }
    </script>

    <script src="https://www.w3schools.com/lib/w3.js"></script>

    <script>
        $(document).ready(function () {
            $("#entireSearch, #columnSearch").on("keyup", function () {
                let entireValue = $("#entireSearch").val().toLowerCase();
                let columnValue = $("#columnSearch").val().toLowerCase();
                let selectedColumn = $("#columnSelect").val();

                $("#geeks tr").each(function () {
                    let rowText = $(this).text().toLowerCase();
                    // Show all rows if entire search is empty
                    let matchEntire = entireValue === "";

                    if (entireValue !== "") {
                        matchEntire = rowText.indexOf(entireValue) > -1;
                    }
                    // Assuming all rows initially match column search
                    let matchColumn = true;
                    if (selectedColumn !== "all" && columnValue !== "") {
                        let columnData = $(this).find("td:nth-child(" +
                            (selectedColumn === "Course" ? 1 :
                                (selectedColumn === "Duration" ? 2 : 3)) +
                            ")").text().toLowerCase();
                        matchColumn = columnData.indexOf(columnValue) > -1;
                    }

                    $(this).toggle(matchEntire && matchColumn);
                });
            });
        });
    </script>

    <script>
        $(document).ready(function () {
            $('#dwnldBtn').on('click', function () {
                downloadExcelTable('myTable', 'data');
            });

            function downloadExcelTable(tableID, filename = '') {
                const linkToDownloadFile = document.
                    createElement("a");
                const fileType = 'application/vnd.ms-excel';
                const selectedTable = document.
                    getElementById(tableID);
                const selectedTableHTML = selectedTable.outerHTML.
                    replace(/ /g, '%20');

                filename = filename ? filename + '.xls' :
                    'excel_data.xls';
                document.body.appendChild(linkToDownloadFile);

                if (navigator.msSaveOrOpenBlob) {
                    const myBlob = new Blob(['\ufeff',
                        selectedTableHTML
                    ], {
                        type: fileType
                    });
                    navigator.msSaveOrOpenBlob(myBlob, filename);
                } else {
                    // Create a link to download
                    // the excel the file
                    linkToDownloadFile.href = 'data:' + fileType +
                        ', ' + selectedTableHTML;

                    // Setting the name of
                    // the downloaded file
                    linkToDownloadFile.download = filename;

                    // Clicking the download link 
                    // on click to the button
                    linkToDownloadFile.click();
                }
            }
        });
    </script>

@endsection