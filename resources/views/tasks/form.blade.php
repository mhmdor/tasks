<!-- Button trigger modal -->


<div class="head d-flex align-items-center justify-content-between mb-4">

    <div class="left d-flex align-items-center">


        <div class="search">
            <i class="bi bi-search"></i>
            <input id="entireSearch" placeholder="Search Here ...." type="search" placeholder="Search">
        </div>

    </div>

    <div class="right d-flex align-items-center gap-md-5 gap-3">

        <div class="addClient">
            <button data-bs-toggle="modal" data-bs-target="#exampleModalLong" class="d-flex align-items-center gap-2">
                <svg xmlns="http://www.w3.org/2000/svg" width="10" height="10" viewBox="0 0 10 10" fill="none">
                    <path d="M6 0H4V4H0V6H4V10H6V6H10V4H6V0Z" fill="currentColor" />
                </svg>
                Add New Task
            </button>
        </div>
        <!-- Export Excel File -->
        <button id="dwnldBtn">
            <svg width="26" height="24" viewBox="0 0 26 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path
                    d="M14.4997 20.6233V0H12.8345C8.55763 0.772698 4.29234 1.48744 0 2.22923V21.736C4.22279 22.4816 8.49968 23.2273 12.7495 24H14.4881V20.6233H14.4997ZM8.20992 16.3426C7.67721 15.2035 7.21024 14.0348 6.81133 12.8422C6.42498 13.9742 5.89182 15.0406 5.45525 16.1494C4.84482 16.1494 4.23438 16.1146 3.62395 16.0914C4.3387 14.689 5.03026 13.275 5.76819 11.8841C5.1423 10.4469 4.45074 9.04057 3.80554 7.61494L5.65229 7.51062C6.06568 8.60013 6.52157 9.67804 6.86542 10.7946C7.25177 9.6085 7.78107 8.4765 8.25241 7.34836C8.88345 7.30457 9.51577 7.26594 10.1494 7.23245C9.4076 8.75725 8.65937 10.2859 7.9047 11.8184C8.6774 13.3638 9.4501 14.9285 10.2228 16.4894C9.55055 16.4353 8.88216 16.3928 8.20992 16.3426Z"
                    fill="#2D3245" />
                <path
                    d="M15.2029 2.67358V4.1533H18.1585V6.33617H15.2029V7.53385H18.1585V9.71673H15.2029V10.9144H18.1585V13.0934H15.2029V14.2911H18.1585V16.4547H15.2029V17.7219H18.1585V19.8352H15.2029V21.3149H25.4102V2.67358H15.2029ZM23.1578 19.8507H18.8616V17.7373H23.1578V19.8507ZM23.1578 16.4701H18.8616V14.2872H23.1578V16.4701ZM23.1578 13.0896H18.8616V10.9105H23.1578V13.0896ZM23.1578 9.709H18.8616V7.52999H23.1578V9.709ZM23.1578 6.32845H18.8616V4.1533H23.1578V6.32845Z"
                    fill="#2D3245" />
            </svg>
            Export Excel File
        </button>

    </div>

</div>

<!-- Modal -->
<div class="modal fade" id="exampleModalLong" tabindex="-1" aria-labelledby="exampleModalLongTitle">
    <div class="modal-dialog ">
        <form id="formId">
            <div class="modal-content">
                <div style="background-color:#2D3245" class="modal-header">
                    <div class="col-md-11">
                        <h4 class="text-white modal-title">Task</h4>
                    </div>
                    <div class="col-md-1">
                        <button type="button" class="btn-close float-start" data-bs-dismiss="modal"
                            aria-label="Close"></button>
                    </div>
                </div>

                <div class="modal-body">
                    <input type="hidden" name="id" id="id">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="name">Name</label>
                                <input type="text" name="name" id="name" class="form-control" autocomplete="off"
                                    autofocus>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="category_id">Category</label>
                                <select id="category_id" name="category_id" class="form-control">
                                    <option value="">choose</option>
                                    @foreach ($categories as $category_)
                                        <option value="{{ $category_->id }}">{{ $category_->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="done">Done</label>
                                <select id="done" name="done" class="form-control">
                                    <option value="0">No</option>
                                    <option value="1">Yes</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="description">Description</label>
                                <textarea rows="4" cols="50" name="description" id="description"
                                    class="form-control"></textarea>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="modal-footer">
                    <button style="width:100px" type="submit" class="btn btn-success">
                        Save
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>