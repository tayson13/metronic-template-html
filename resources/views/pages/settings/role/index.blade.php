@extends('layouts.master')

@section('roles.index')
    active
@stop

@section('breadcrumb_navigation_title')
    Roles List
@endsection

@section('breadcrumb_navigation_path')
    @include('partials.breadcrumb-navigation', [
        'breadcrumbs'=>[
            ['name'=> 'Role Management', 'url' => 'roles.index'],
        ]
    ])
@endsection

@section('page_css')
    <link href="{{asset('assets/plugins/custom/datatables/datatables.bundle.css')}}" rel="stylesheet" type="text/css"/>
@endsection

@section('page_content')
    <div class="card">
        <!--begin::Card header-->
        <div class="card-header border-0 pt-6">
            <!--begin::Card title-->
            <div class="card-title">
                <!--begin::Search-->
                <div class="d-flex align-items-center position-relative my-1">
                    <span
                        class="svg-icon svg-icon-1 position-absolute ms-6">@include('components.svg.search_icon')</span>

                    <input id="searchInput" type="text" data-kt-user-table-filter="search"
                           class="form-control form-control-solid w-250px ps-14" placeholder="Search role"/>
                </div>
                <!--end::Search-->
            </div>
            <!--begin::Card title-->
            <!--begin::Card toolbar-->
            <div class="card-toolbar">
                <!--begin::Toolbar-->
                <div class="d-flex justify-content-end" data-kt-user-table-toolbar="base">
                    <!--begin::Add user-->
                    <a href="{{route('roles.create')}}" class="btn btn-info hover-scale">
                        <!--begin::Svg Icon-->
                        <span class="svg-icon svg-icon-2">
                             <i class="fa-solid fa-plus fs-2"></i>
                        </span>
                        <!--end::Svg Icon-->
                        Add Role
                    </a>
                    <!--end::Add user-->
                </div>
                <!--end::Toolbar-->
            </div>
            <!--end::Card toolbar-->
        </div>
        <!--end::Card header-->
        <!--begin::Card body-->
        <div class="card-body py-4">
            <!--begin::Table-->
            <table class="table align-middle table-row-dashed fs-6 gy-5" id="kt_table_roles">
                <!--begin::Table head-->
                <thead>
                <!--begin::Table row-->
                <tr class="text-start text-muted fw-bold fs-7 text-uppercase gs-0">
                    <th class="min-w-125px">Name</th>
                    <th class="min-w-125px">Guard Name</th>
                    <th class="text-end min-w-100px">Actions</th>
                </tr>
                <!--end::Table row-->
                </thead>
                <!--end::Table head-->
                <!--begin::Table body-->
                <tbody class="text-gray-600 fw-semibold">
                @foreach($roles as $role)
                    <!--begin::Table row-->
                    <tr>

                        <!--begin::Name-->
                        <td>
                            {{$role->name}}
                        </td>
                        <!--end::Name-->

                        <!--begin::Guard Name-->
                        <td>
                            <span class="badge badge-light-info">{{$role->guard_name}}</span>
                        </td>
                        <!--end::Guard Name-->

                        <!--begin::Action=-->
                        <td class="text-end">
                            <a href="#" class="btn btn-light btn-active-light-info btn-sm"
                               data-kt-menu-trigger="click"
                               data-kt-menu-placement="bottom-end">
                                Actions
                                <span class="svg-icon svg-icon-5 m-0">@include('components.svg.arrow_down')</span>
                            </a>
                            <!--begin::Menu-->
                            <div
                                class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary  fw-semibold fs-7 w-125px py-4"
                                data-kt-menu="true">
                                <!--begin::Menu item-->
                                <div class="menu-item px-3">
                                    <a href="{{route('roles.edit', $role->id)}}" class="menu-link px-3">
                                        <i class="fa-regular fa-pen-to-square me-2"></i> Edit
                                    </a>
                                </div>
                                <!--end::Menu item-->
                                <!--begin::Menu item-->
                                <div class="menu-item px-3">
                                    <a href="{{route('roles.show', $role->id)}}" class="menu-link px-3">
                                        <i class="fa-solid fa-eye me-2"></i> View
                                    </a>
                                </div>
                                <!--end::Menu item-->
                            </div>
                            <!--end::Menu-->
                        </td>
                        <!--end::Action=-->
                    </tr>
                    <!--end::Table row-->
                @endforeach
                </tbody>
                <!--end::Table body-->
            </table>
            <!--end::Table-->
        </div>
        <!--end::Card body-->
    </div>
@endsection


@section('page_scripts')
    <!--begin::Vendors Javascript(used for this page only)-->
    <script src="{{asset('assets/plugins/custom/datatables/datatables.bundle.js')}}"></script>
    <!--end::Vendors Javascript-->

    <script>
        const table = $('#kt_table_roles').DataTable();

        // #searchInput is a <input type="text"> element
        $('#searchInput').on('keyup', function () {
            table.search(this.value).draw();
        });
    </script>
@endsection
