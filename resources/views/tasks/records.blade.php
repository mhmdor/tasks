<div class="row ">

    @if(count($records))

        <select hidden id="columnSelect">
            <option value="all">All Columns</option>
        </select>
        <input hidden id="columnSearch" type="text" placeholder="Search column">

        <div class="scroll">
            <table id="myTable" class="bg-white">
                <thead>
                    <th onclick="w3.sortHTML('#myTable','.item', 'td:nth-child(1)')">ID <i class="fa fa-sort"
                            aria-hidden="true"></i></th>
                    <th onclick="w3.sortHTML('#myTable','.item', 'td:nth-child(2)')">Name <i class="fa fa-sort"
                            aria-hidden="true"></i></th>
                    <th onclick="w3.sortHTML('#myTable','.item', 'td:nth-child(3)')">Category <i class="fa fa-sort"
                            aria-hidden="true"></i></th>
                    <th onclick="w3.sortHTML('#myTable','.item', 'td:nth-child(4)')">Description <i class="fa fa-sort"
                            aria-hidden="true"></i></th>
                    <th onclick="w3.sortHTML('#myTable','.item', 'td:nth-child(5)')">Done <i class="fa fa-sort"
                            aria-hidden="true"></i></th>
                    <th>Action</th>
                </thead>
                <tbody id="geeks">
                    @foreach ($records as $rec)
                        <tr class="item">
                            <td>{{ $rec->id }}</td>
                            <td>{{ $rec->name }}</td>
                            <td>{{ $rec->category->name }}</td>
                            <td>{{ $rec->description }}</td>
                            <td>
                                @if ($rec->done)
                                    <i class="fa fa-check" aria-hidden="true"></i>
                                @else
                                    <i class="fa fa-close" aria-hidden="true"></i>
                                @endif
                            </td>
                            <td class="d-flex align-items-center justify-content-center gap-sm-3 gap-2">

                                <a href="javascript:edit({{ $rec->id }})">
                                    <li>
                                        <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 14 14"
                                            fill="none">
                                            <path
                                                d="M1.14598 12.854H1.98636L10.4475 4.39291L9.60709 3.55252L1.14598 12.0136V12.854ZM12.8731 3.57162L10.4284 1.12688L11.2306 0.324693C11.447 0.108231 11.7144 0 12.0327 0C12.3511 0 12.6185 0.108231 12.8349 0.324693L13.6753 1.16507C13.8918 1.38154 14 1.64893 14 1.96726C14 2.28558 13.8918 2.55298 13.6753 2.76944L12.8731 3.57162ZM12.0709 4.37381L2.44475 14H0V11.5553L9.62619 1.92906L12.0709 4.37381ZM10.0273 3.97271L9.60709 3.55252L10.4475 4.39291L10.0273 3.97271Z"
                                                fill="currentColor" />
                                        </svg>
                                    </li>
                                </a>
                                <a href="javascript:destroy({{ $rec->id }})">
                                    <li id="deleteBtn">
                                        <svg class="delete-icon" xmlns="http://www.w3.org/2000/svg" width="14" height="18"
                                            viewBox="0 0 14 18" fill="none">
                                            <path
                                                d="M11 6V16H3V6H11ZM9.5 0H4.5L3.5 1H0V3H14V1H10.5L9.5 0ZM13 4H1V16C1 17.1 1.9 18 3 18H11C12.1 18 13 17.1 13 16V4Z"
                                                fill="currentColor" />
                                        </svg>
                                    </li>
                                </a>
                            </td>


                        </tr>
                    @endforeach

                </tbody>


            </table>
        </div>





    @else
        <div class="alert alert-success">No Tasks</div>
    @endif

</div>