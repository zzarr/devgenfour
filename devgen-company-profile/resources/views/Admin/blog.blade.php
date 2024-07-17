<div class="row row-sm">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">List Blog/Article</h3>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <a href="{{ route('blog.create') }}" class="btn btn-primary mb-4 data-table-btn"><i class="fa fa-plus"></i> Blog / Article</a>
                    <table id="datatable" class="border-top-0 table table-bordered border-bottom">
                        <thead>
                            <tr>
                                <th class="border-bottom-0">No</th>
                                <th class="border-bottom-0">Action</th>
                                <th class="border-bottom-0">Status</th>
                                <th class="border-bottom-0">Banner</th>
                                <th class="border-bottom-0">Thumbnail</th>
                                <th class="border-bottom-0">Title</th>
                                <th class="border-bottom-0">Content</th>
                                <th class="border-bottom-0">Created By</th>
                            </tr>
                        </thead>
                        <tbody>
                            
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    var $table;
    
    $(document).ready(function() {
        
        table = $("#datatable").DataTable({
            // responsive: true,
            processing: true,
            serverSide: true,
            scrollX: true,
            // autoWidth: true,
            ajax: "{{ route('blog.datatable') }}",
            columnDefs: [
                {
                    targets: 0,
                    render: function(data, type, full, meta) {
                        return (meta.row + 1);
                    }
                }, 
                {
                    targets: 1,
                    width: 150,
                    className: 'text-center',
                    render: function(data, type, full, meta) {
                        let role = {{ getRoleName() }};
                        let is_can = {{ auth()->user()->can('member-account') }};
                        
                        let state = ``;
                        if(role == 'admin' || is_can){
                            state = <button type="button" data-id="${data}" data-update="1" class="btn btn-icon btn-success btn-approval" title="Approve"><span class="fe fe-check"> </span></button>;
                            
                            if(!!+full.is_approved)
                                state = <button type="button" data-id="${data}" data-update="0" class="btn btn-icon btn-warning btn-approval" title="Disapprove"><span class="fe fe-x-circle"> </span></button>;
                        }

                        let btn = `
                        <div class="btn-list">
                            ${state}
                            <a href="{{ route('blog.edit', ':id') }}" class="btn btn-icon btn-primary"><span class="fe fe-edit"> </span></a>
                            <a href="javascript:void(0)" onclick="destroy('${data}')" class="btn btn-icon btn-danger btn-delete"><span class="fe fe-trash-2"> </span></a>
                        </div>
                        `;

                        btn = btn.replaceAll(':id', data);

                        return btn;
                    },
                },
                {
                    targets: 2,
                    render: function(data, type, full, meta) {
                        if(!!+data) return <a class="badge bg-success" href="javascript:void(0);">Approved</a>;
                        else return <a class="badge bg-danger" href="javascript:void(0);">Unapproved</a>;
                    }
                }, 
                {
                    targets: 3,
                    render: function(data, type, full, meta) {
                        return data ? <img class="img-thumbnail wd-100p wd-sm-200" src="{{ asset('/') }}${data}"> : <img class="img-thumbnail wd-100p wd-sm-200" src="{{ asset('virtual/assets/img/default.png') }}">;
                    }
                }, 
                {
                    targets: 4,
                    render: function(data, type, full, meta) {
                        return data ? <img class="img-thumbnail wd-100p wd-sm-200" src="{{ asset('/') }}${data}"> : <img class="img-thumbnail wd-100p wd-sm-200" src="{{ asset('virtual/assets/img/default.png') }}">;
                    }
                }, 
                {
                    targets: 5,
                    width: 300,
                    createdCell: function(td, cellData, rowData, row, col) {
                        if($(td).text().length > 50) {
                            let txt = $(td).text()
                            $(td).text(txt.substr(0, 50) + '...')
                        }
                    },

                },
                {
                    targets: 6,
                    width: 300,
                    createdCell: function(td, cellData, rowData, row, col) {
                        $(td).html($(td).text())
                        if($(td).text().length > 150) {
                            let txt = $(td).text()
                            $(td).text(txt.substr(0, 150) + '...')
                        }
                    },

                },
                {
                    targets: 7,
                    render: function(data, type, full, meta) {
                        console.log(data);
                        if (data != 'Admin') return <a href="javascript:void(0);" class="btn btn-sm btn-outline-dark">${data}</a>
                        else return <a href="javascript:void(0);" class="btn btn-sm btn-outline-primary">${data}</a>
                    }
                },
            ], 
            columns: [
                { data: null },
                { data: 'id'}, 
                { data: 'is_approved'},
                { data: 'banner_image'},
                { data: 'image'},
                { data: 'title'},
                { data: 'desc'},
                { data: 'member_name'},
            ],
            language: {
                searchPlaceholder: 'Search...',
                sSearch: '',
            }
        });

</script>