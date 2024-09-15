@extends('admin.layouts.default')
@section('content')
    <div class="main-content">
        <!-- Page Header -->
        <div class="block justify-between page-header md:flex">
            <div>
                <h3 class="text-gray-700 hover:text-gray-900 dark:text-white dark:hover:text-white text-2xl font-medium">
                    Course Dashboard</h3>
            </div>
            <ol class="flex items-center whitespace-nowrap min-w-0">
                <li class="text-sm">
                    <a class="flex items-center font-semibold text-primary hover:text-primary dark:text-primary truncate"
                        href="javascript:void(0);">
                        Home
                        <i
                            class="ti ti-chevrons-right flex-shrink-0 mx-3 overflow-visible text-gray-300 dark:text-gray-300 rtl:rotate-180"></i>
                    </a>
                </li>
                <li class="text-sm text-gray-500 hover:text-primary dark:text-white/70 " aria-current="page">
                    Course Dashboard
                </li>
            </ol>
        </div>
        <!-- Page Header Close -->

        <!-- Start::row-1 -->
        <div class="grid grid-cols-12 gap-x-5">
            <div class="col-span-12 md:col-span-6 xxl:col-span-3">
                <div class="box">
                    <div class="box-body relative">
                        <a aria-label="anchor" href="javascript:void(0);" class="absolute w-full h-full inset-0"></a>
                        <div class="flex items-center">
                            <a aria-label="anchor" href="javascript:void(0);" class="pe-4 block">
                                <span class="avatar rounded-sm bg-primary/20 text-primary p-3"><i
                                        class="ti ti-wallet text-2xl leading-none"></i></span>
                            </a>
                            <div class="flex-1 font-medium">
                                <h4 class="text-2xl text-gray-800 dark:text-white font-medium">$98,450</h4>
                                <div class="flex justify-between items-center">
                                    <span class="text-gray-500 dark:text-white/70 text-xs">YTD Earning</span>
                                    <span class="text-success text-xs inline-flex"><i
                                            class="ti ti-trending-up text-base me-1"></i><span
                                            class="my-auto">+2.02%</span></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-span-12 md:col-span-6 xxl:col-span-3">
                <div class="box">
                    <div class="box-body relative">
                        <a aria-label="anchor" href="javascript:void(0);" class="absolute w-full h-full inset-0"></a>
                        <div class="flex items-center">
                            <a aria-label="anchor" href="javascript:void(0);" class="pe-4 block">
                                <span class="avatar rounded-sm bg-secondary/20 text-secondary p-3"><i
                                        class="ti ti-users  text-2xl leading-none"></i></span>
                            </a>
                            <div class="flex-1 font-medium">
                                <h4 class="text-2xl text-gray-800 dark:text-white font-medium">15,379</h4>
                                <div class="flex justify-between items-center">
                                    <span class="text-gray-500 dark:text-white/70 text-xs">Total Students</span>
                                    <span class="text-danger text-xs inline-flex">
                                        <i class="ti ti-trending-down text-base me-1"></i>
                                        <span class="my-auto">+2.02%</span>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-span-12 md:col-span-6 xxl:col-span-3">
                <div class="box">
                    <div class="box-body relative">
                        <a aria-label="anchor" href="javascript:void(0);" class="absolute w-full h-full inset-0"></a>
                        <div class="flex items-center">
                            <a aria-label="anchor" href="javascript:void(0);" class="pe-4 block">
                                <span class="avatar rounded-sm bg-warning/20 text-warning p-3"><i
                                        class="ti ti-id text-2xl leading-none"></i></span>
                            </a>
                            <div class="flex-1 font-medium">
                                <h4 class="text-2xl text-gray-800 dark:text-white font-medium">377</h4>
                                <div class="flex justify-between items-center">
                                    <span class="text-gray-500 dark:text-white/70 text-xs">Total Instructors</span>
                                    <span class="text-danger text-xs inline-flex"><i
                                            class="ti ti-trending-down text-base me-1"></i><span
                                            class="my-auto">+2.02%</span></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-span-12 md:col-span-6 xxl:col-span-3">
                <div class="box">
                    <div class="box-body relative">
                        <a aria-label="anchor" href="javascript:void(0);" class="absolute w-full h-full inset-0"></a>
                        <div class="flex items-center">
                            <a aria-label="anchor" href="javascript:void(0);" class="pe-4 block">
                                <span class="avatar rounded-sm bg-danger/20 text-danger p-3"><i
                                        class="ti ti-gift text-2xl leading-none"></i></span>
                            </a>
                            <div class="flex-1 font-medium">
                                <h4 class="text-2xl text-gray-800 dark:text-white font-medium">11,016</h4>
                                <div class="flex justify-between items-center">
                                    <span class="text-gray-500 dark:text-white/70 text-xs">Total Courses</span>
                                    <span class="text-success text-xs inline-flex"><i
                                            class="ti ti-trending-up text-base me-1"></i><span
                                            class="my-auto">+2.02%</span></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-span-12 xl:col-span-6 overflow-hidden">
            <div class="box">
                <div class="box-header">
                    <h5 class="box-title">
                        Line Chart
                    </h5>
                </div>
                <div class="box-body">
                    <div id="line-chart"></div>
                </div>
            </div>
        </div>

        <!-- Start::row-2 -->
        <div class="grid grid-cols-12 gap-x-5 overflow-hidden">
            <div class="col-span-12 ">
                <div class="box">
                    <div class="box-header">
                        <div class="sm:flex justify-between sm:space-y-0 space-y-2">
                            <h5 class="box-title my-auto">Earnings Report</h5>
                            <div class="inline-flex rounded-md shadow-sm">
                                <button type="button"
                                    class="ti-btn-group text-xs !border-0 py-2 px-3 ti-btn-soft-primary">
                                    1D
                                </button>
                                <button type="button"
                                    class="ti-btn-group text-xs !border-0 py-2 px-3 ti-btn-soft-primary">
                                    1W
                                </button>
                                <button type="button"
                                    class="ti-btn-group text-xs !border-0 py-2 px-3 ti-btn-soft-primary">
                                    1M
                                </button>
                                <button type="button"
                                    class="ti-btn-group text-xs !border-0 py-2 px-3 ti-btn-soft-primary">
                                    3M
                                </button>
                                <button type="button"
                                    class="ti-btn-group text-xs !border-0 py-2 px-3 ti-btn-soft-primary">
                                    6M
                                </button>
                                <button type="button" class="ti-btn-group text-xs !border-0 py-2 px-3 ti-btn-primary">
                                    1Y
                                </button>
                            </div>
                        </div>
                    </div>
                    <div class="box-body">
                        <div id="earningsReport"></div>
                    </div>
                </div>
            </div>

        </div>
        <!-- End::row-2 -->


        <!-- Start::row-4 -->
        <div class="grid grid-cols-12 gap-x-5">
            <div class="col-span-12">
                <div class="box">
                    <div class="box-header">
                        <div class="flex">
                            <h5 class="box-title my-auto">Course List</h5>
                            <div class="hs-dropdown ti-dropdown block ms-auto my-auto">
                                <button type="button"
                                    class="hs-dropdown-toggle ti-dropdown-toggle rounded-sm p-1 px-3 !border border-gray-200 text-gray-400 hover:text-gray-500 hover:bg-gray-200 hover:border-gray-200 focus:ring-gray-200  dark:hover:bg-black/30 dark:border-white/10 dark:hover:border-white/20 dark:focus:ring-white/10 dark:focus:ring-offset-white/10">
                                    View All <i class="ti ti-chevron-down"></i></button>
                                <div class="hs-dropdown-menu ti-dropdown-menu hidden">
                                    <a class="ti-dropdown-item" href="javascript:void(0)">Download</a>
                                    <a class="ti-dropdown-item" href="javascript:void(0)">Import</a>
                                    <a class="ti-dropdown-item" href="javascript:void(0)">Export</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="box-body">
                        <div class="table-bordered rounded-sm ti-custom-table-head overflow-auto">
                            <table class="ti-custom-table ti-custom-table-head whitespace-nowrap">
                                <thead class="bg-gray-50 dark:bg-bodybg">
                                    <tr class="">
                                        <th scope="col" class="dark:text-white/80">S.no</th>
                                        <th scope="col" class="dark:text-white/80">Course</th>
                                        <th scope="col" class="dark:text-white/80">Category</th>
                                        <th scope="col" class="dark:text-white/80">Classes</th>
                                        <th scope="col" class="dark:text-white/80">Last Updated</th>
                                        <th scope="col" class="dark:text-white/80">Instructor</th>
                                        <th scope="col" class="dark:text-white/80">Students</th>
                                        <th scope="col" class="dark:text-white/80">Actions</th>
                                    </tr>
                                </thead>
                                <tbody class="">
                                    <tr class="">
                                        <td>1</td>
                                        <td>
                                            <div class="flex space-x-3 rtl:space-x-reverse text-start">
                                                <img class="avatar avatar-sm rounded-sm" src="../assets/img/media/1.jpg"
                                                    alt="Image Description">
                                                <div class="block my-auto">
                                                    <p
                                                        class="  block text-sm font-semibold my-auto text-gray-800 dark:text-white min-w-[400px]">
                                                        CSS Zero to Hero Master Class</p>
                                                </div>
                                            </div>
                                        </td>
                                        <td>UI/UX</td>
                                        <td>51</td>
                                        <td>22-06-2023</td>
                                        <td>Burak Oin</td>
                                        <td>252</td>
                                        <td class="font-medium space-x-2 rtl:space-x-reverse">
                                            <div class="hs-tooltip ti-main-tooltip">
                                                <a href="javascript:void(0);"
                                                    class="m-0 hs-tooltip-toggle relative w-8 h-8 ti-btn rounded-full p-0 transition-none focus:outline-none ti-btn-soft-primary">
                                                    <i class="ti ti-eye"></i>
                                                    <span
                                                        class="hs-tooltip-content ti-main-tooltip-content py-1 px-2 bg-gray-900 text-xs font-medium text-white shadow-sm dark:bg-slate-700 hidden"
                                                        role="tooltip" data-popper-placement="top"
                                                        style="position: fixed; inset: auto auto 0px 0px; margin: 0px; transform: translate(1686px, -243px);">
                                                        View
                                                    </span>
                                                </a>
                                            </div>
                                            <div class="hs-tooltip ti-main-tooltip">
                                                <a href="javascript:void(0);"
                                                    class="m-0 hs-tooltip-toggle relative w-8 h-8 ti-btn rounded-full p-0 transition-none focus:outline-none ti-btn-soft-secondary">
                                                    <i class="ti ti-pencil"></i>
                                                    <span
                                                        class="hs-tooltip-content ti-main-tooltip-content py-1 px-2 bg-gray-900 text-xs font-medium text-white shadow-sm dark:bg-slate-700 hidden"
                                                        role="tooltip" data-popper-placement="top"
                                                        style="position: fixed; inset: auto auto 0px 0px; margin: 0px; transform: translate(1686px, -243px);">
                                                        Edit
                                                    </span>
                                                </a>
                                            </div>
                                            <div class="hs-tooltip ti-main-tooltip">
                                                <a href="javascript:void(0);"
                                                    class="m-0 hs-tooltip-toggle relative w-8 h-8 ti-btn rounded-full p-0 transition-none focus:outline-none ti-btn-soft-danger">
                                                    <i class="ti ti-trash"></i>
                                                    <span
                                                        class="hs-tooltip-content ti-main-tooltip-content py-1 px-2 bg-gray-900 text-xs font-medium text-white shadow-sm dark:bg-slate-700"
                                                        role="tooltip">
                                                        Delete
                                                    </span>
                                                </a>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr class="">
                                        <td>2</td>
                                        <td>
                                            <div class="flex space-x-3 rtl:space-x-reverse text-start">
                                                <img class="avatar avatar-sm rounded-sm" src="../assets/img/media/4.jpg"
                                                    alt="Image Description">
                                                <div class="block my-auto">
                                                    <p
                                                        class="  block text-sm font-semibold my-auto text-gray-800 dark:text-white min-w-[400px]">
                                                        Digital Marketing Course From Scratch</p>
                                                </div>
                                            </div>
                                        </td>
                                        <td>Marketing</td>
                                        <td>115</td>
                                        <td>21-06-2023</td>
                                        <td>Stuart Little</td>
                                        <td>1,189</td>
                                        <td class="font-medium space-x-2 rtl:space-x-reverse">
                                            <div class="hs-tooltip ti-main-tooltip">
                                                <a href="javascript:void(0);"
                                                    class="m-0 hs-tooltip-toggle relative w-8 h-8 ti-btn rounded-full p-0 transition-none focus:outline-none ti-btn-soft-primary">
                                                    <i class="ti ti-eye"></i>
                                                    <span
                                                        class="hs-tooltip-content ti-main-tooltip-content py-1 px-2 bg-gray-900 text-xs font-medium text-white shadow-sm dark:bg-slate-700 hidden"
                                                        role="tooltip" data-popper-placement="top"
                                                        style="position: fixed; inset: auto auto 0px 0px; margin: 0px; transform: translate(1686px, -243px);">
                                                        View
                                                    </span>
                                                </a>
                                            </div>
                                            <div class="hs-tooltip ti-main-tooltip">
                                                <a href="javascript:void(0);"
                                                    class="m-0 hs-tooltip-toggle relative w-8 h-8 ti-btn rounded-full p-0 transition-none focus:outline-none ti-btn-soft-secondary">
                                                    <i class="ti ti-pencil"></i>
                                                    <span
                                                        class="hs-tooltip-content ti-main-tooltip-content py-1 px-2 bg-gray-900 text-xs font-medium text-white shadow-sm dark:bg-slate-700 hidden"
                                                        role="tooltip" data-popper-placement="top"
                                                        style="position: fixed; inset: auto auto 0px 0px; margin: 0px; transform: translate(1686px, -243px);">
                                                        Edit
                                                    </span>
                                                </a>
                                            </div>
                                            <div class="hs-tooltip ti-main-tooltip">
                                                <a href="javascript:void(0);"
                                                    class="m-0 hs-tooltip-toggle relative w-8 h-8 ti-btn rounded-full p-0 transition-none focus:outline-none ti-btn-soft-danger">
                                                    <i class="ti ti-trash"></i>
                                                    <span
                                                        class="hs-tooltip-content ti-main-tooltip-content py-1 px-2 bg-gray-900 text-xs font-medium text-white shadow-sm dark:bg-slate-700"
                                                        role="tooltip">
                                                        Delete
                                                    </span>
                                                </a>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr class="">
                                        <td>3</td>
                                        <td>
                                            <div class="flex space-x-3 rtl:space-x-reverse text-start">
                                                <img class="avatar avatar-sm rounded-sm" src="../assets/img/media/10.jpg"
                                                    alt="Image Description">
                                                <div class="block my-auto">
                                                    <p
                                                        class="  block text-sm font-semibold my-auto text-gray-800 dark:text-white min-w-[400px]">
                                                        Data Structures &amp; Algorithms For Beginners</p>
                                                </div>
                                            </div>
                                        </td>
                                        <td>Programming</td>
                                        <td>30</td>
                                        <td>15-06-2023</td>
                                        <td>Boran Ray</td>
                                        <td>3,365</td>
                                        <td class="font-medium space-x-2 rtl:space-x-reverse">
                                            <div class="hs-tooltip ti-main-tooltip">
                                                <a href="javascript:void(0);"
                                                    class="m-0 hs-tooltip-toggle relative w-8 h-8 ti-btn rounded-full p-0 transition-none focus:outline-none ti-btn-soft-primary">
                                                    <i class="ti ti-eye"></i>
                                                    <span
                                                        class="hs-tooltip-content ti-main-tooltip-content py-1 px-2 bg-gray-900 text-xs font-medium text-white shadow-sm dark:bg-slate-700 hidden"
                                                        role="tooltip" data-popper-placement="top"
                                                        style="position: fixed; inset: auto auto 0px 0px; margin: 0px; transform: translate(1686px, -243px);">
                                                        View
                                                    </span>
                                                </a>
                                            </div>
                                            <div class="hs-tooltip ti-main-tooltip">
                                                <a href="javascript:void(0);"
                                                    class="m-0 hs-tooltip-toggle relative w-8 h-8 ti-btn rounded-full p-0 transition-none focus:outline-none ti-btn-soft-secondary">
                                                    <i class="ti ti-pencil"></i>
                                                    <span
                                                        class="hs-tooltip-content ti-main-tooltip-content py-1 px-2 bg-gray-900 text-xs font-medium text-white shadow-sm dark:bg-slate-700 hidden"
                                                        role="tooltip" data-popper-placement="top"
                                                        style="position: fixed; inset: auto auto 0px 0px; margin: 0px; transform: translate(1686px, -243px);">
                                                        Edit
                                                    </span>
                                                </a>
                                            </div>
                                            <div class="hs-tooltip ti-main-tooltip">
                                                <a href="javascript:void(0);"
                                                    class="m-0 hs-tooltip-toggle relative w-8 h-8 ti-btn rounded-full p-0 transition-none focus:outline-none ti-btn-soft-danger">
                                                    <i class="ti ti-trash"></i>
                                                    <span
                                                        class="hs-tooltip-content ti-main-tooltip-content py-1 px-2 bg-gray-900 text-xs font-medium text-white shadow-sm dark:bg-slate-700"
                                                        role="tooltip">
                                                        Delete
                                                    </span>
                                                </a>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr class="">
                                        <td>4</td>
                                        <td>
                                            <div class="flex space-x-3 rtl:space-x-reverse text-start">
                                                <img class="avatar avatar-sm rounded-sm" src="../assets/img/media/15.jpg"
                                                    alt="Image Description">
                                                <div class="block my-auto">
                                                    <p
                                                        class="  block text-sm font-semibold my-auto text-gray-800 dark:text-white min-w-[400px]">
                                                        Master Linear Algebra Medium Level</p>
                                                </div>
                                            </div>
                                        </td>
                                        <td>Mathematics</td>
                                        <td>90</td>
                                        <td>11-06-2023</td>
                                        <td>Arya Neo</td>
                                        <td>773</td>
                                        <td class="font-medium space-x-2 rtl:space-x-reverse">
                                            <div class="hs-tooltip ti-main-tooltip">
                                                <a href="javascript:void(0);"
                                                    class="m-0 hs-tooltip-toggle relative w-8 h-8 ti-btn rounded-full p-0 transition-none focus:outline-none ti-btn-soft-primary">
                                                    <i class="ti ti-eye"></i>
                                                    <span
                                                        class="hs-tooltip-content ti-main-tooltip-content py-1 px-2 bg-gray-900 text-xs font-medium text-white shadow-sm dark:bg-slate-700 hidden"
                                                        role="tooltip" data-popper-placement="top"
                                                        style="position: fixed; inset: auto auto 0px 0px; margin: 0px; transform: translate(1686px, -243px);">
                                                        View
                                                    </span>
                                                </a>
                                            </div>
                                            <div class="hs-tooltip ti-main-tooltip">
                                                <a href="javascript:void(0);"
                                                    class="m-0 hs-tooltip-toggle relative w-8 h-8 ti-btn rounded-full p-0 transition-none focus:outline-none ti-btn-soft-secondary">
                                                    <i class="ti ti-pencil"></i>
                                                    <span
                                                        class="hs-tooltip-content ti-main-tooltip-content py-1 px-2 bg-gray-900 text-xs font-medium text-white shadow-sm dark:bg-slate-700 hidden"
                                                        role="tooltip" data-popper-placement="top"
                                                        style="position: fixed; inset: auto auto 0px 0px; margin: 0px; transform: translate(1686px, -243px);">
                                                        Edit
                                                    </span>
                                                </a>
                                            </div>
                                            <div class="hs-tooltip ti-main-tooltip">
                                                <a href="javascript:void(0);"
                                                    class="m-0 hs-tooltip-toggle relative w-8 h-8 ti-btn rounded-full p-0 transition-none focus:outline-none ti-btn-soft-danger">
                                                    <i class="ti ti-trash"></i>
                                                    <span
                                                        class="hs-tooltip-content ti-main-tooltip-content py-1 px-2 bg-gray-900 text-xs font-medium text-white shadow-sm dark:bg-slate-700"
                                                        role="tooltip">
                                                        Delete
                                                    </span>
                                                </a>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr class="">
                                        <td>5</td>
                                        <td>
                                            <div class="flex space-x-3 rtl:space-x-reverse text-start">
                                                <img class="avatar avatar-sm rounded-sm" src="../assets/img/media/23.jpg"
                                                    alt="Image Description">
                                                <div class="block my-auto">
                                                    <p
                                                        class="  block text-sm font-semibold my-auto text-gray-800 dark:text-white min-w-[400px]">
                                                        Learn How to Trade &amp; Invest - For Absolute Beginners</p>
                                                </div>
                                            </div>
                                        </td>
                                        <td>Stocks &amp; Trading</td>
                                        <td>161</td>
                                        <td>10-06-2023</td>
                                        <td>Sia Niu</td>
                                        <td>51</td>
                                        <td class="font-medium space-x-2 rtl:space-x-reverse">
                                            <div class="hs-tooltip ti-main-tooltip">
                                                <a href="javascript:void(0);"
                                                    class="m-0 hs-tooltip-toggle relative w-8 h-8 ti-btn rounded-full p-0 transition-none focus:outline-none ti-btn-soft-primary">
                                                    <i class="ti ti-eye"></i>
                                                    <span
                                                        class="hs-tooltip-content ti-main-tooltip-content py-1 px-2 bg-gray-900 text-xs font-medium text-white shadow-sm dark:bg-slate-700 hidden"
                                                        role="tooltip" data-popper-placement="top"
                                                        style="position: fixed; inset: auto auto 0px 0px; margin: 0px; transform: translate(1686px, -243px);">
                                                        View
                                                    </span>
                                                </a>
                                            </div>
                                            <div class="hs-tooltip ti-main-tooltip">
                                                <a href="javascript:void(0);"
                                                    class="m-0 hs-tooltip-toggle relative w-8 h-8 ti-btn rounded-full p-0 transition-none focus:outline-none ti-btn-soft-secondary">
                                                    <i class="ti ti-pencil"></i>
                                                    <span
                                                        class="hs-tooltip-content ti-main-tooltip-content py-1 px-2 bg-gray-900 text-xs font-medium text-white shadow-sm dark:bg-slate-700 hidden"
                                                        role="tooltip" data-popper-placement="top"
                                                        style="position: fixed; inset: auto auto 0px 0px; margin: 0px; transform: translate(1686px, -243px);">
                                                        Edit
                                                    </span>
                                                </a>
                                            </div>
                                            <div class="hs-tooltip ti-main-tooltip">
                                                <a href="javascript:void(0);"
                                                    class="m-0 hs-tooltip-toggle relative w-8 h-8 ti-btn rounded-full p-0 transition-none focus:outline-none ti-btn-soft-danger">
                                                    <i class="ti ti-trash"></i>
                                                    <span
                                                        class="hs-tooltip-content ti-main-tooltip-content py-1 px-2 bg-gray-900 text-xs font-medium text-white shadow-sm dark:bg-slate-700"
                                                        role="tooltip">
                                                        Delete
                                                    </span>
                                                </a>
                                            </div>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="box-footer">
                        <div class="sm:flex items-center">
                            <div class="">
                                showing 5 Entries <i class="ri-arrow-right-line ms-2 font-semibold"></i>
                            </div>
                            <div class="ms-auto">
                                <nav class="flex justify-center items-center space-x-2 rtl:space-x-reverse">
                                    <a class="text-gray-500 hover:text-primary e py-1 px-2 leading-none inline-flex items-center gap-2 rounded-sm"
                                        href="javascript:void(0);">
                                        <span aria-hidden="true">Prev</span>
                                        <span class="sr-only">Previous</span>
                                    </a>
                                    <a class="bg-primary text-white py-1 px-2 leading-none inline-flex items-center text-sm font-medium rounded-sm"
                                        href="javascript:void(0);" aria-current="page">1</a>
                                    <a class="text-gray-500 hover:text-primary e py-1 px-2 leading-none inline-flex items-center text-sm font-medium rounded-sm"
                                        href="javascript:void(0);">2</a>
                                    <a class="text-gray-500 hover:text-primary e py-1 px-2 leading-none inline-flex items-center text-sm font-medium rounded-sm"
                                        href="javascript:void(0);">3</a>
                                    <a class="text-gray-500 hover:text-primary e py-1 px-2 leading-none inline-flex items-center gap-2 rounded-sm"
                                        href="javascript:void(0);">
                                        <span class="sr-only">Next</span>
                                        <span aria-hidden="true">Next</span>
                                    </a>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End::row-4 -->

    </div>
@endsection
