<!-- Breadcrumb Start -->
<div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-3">
    <nav>
        <ol class="flex gap-2 text-title-sm">
            <li><a href="{{route('admin.dashboard')}}">Dashboard /</a></li>
            <li class="text-primary">
                <a href="{{route('admin.'.$ui->route.'.index')}}">{{$title}}</a>
            </li>
        </ol>
    </nav>
</div>
<!-- Breadcrumb End -->
