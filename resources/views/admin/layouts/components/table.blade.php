<div class="grid grid-cols-12 gap-6">
    <div class="col-span-12">
        <div class="box">
            <div class="box-body p-0">
                <div class="overflow-auto">
                    <table class="ti-custom-table ti-custom-table-head ti-custom-table-hover">
                        <thead>
                            <tr class="font-bold">
                                <th scope="col">SN</th>
                                @foreach ($ui->columns as $col)
                                    <th scope="col">{{ $col }}</th>
                                @endforeach
                                @if (count($ui->getActions()) > 0)
                                    <th scope="col" class="">
                                        Action
                                    </th>
                                @endif
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($records as $record)
                                <tr>
                                    <td class="font-bold">{{ $records->firstItem() + $loop->index }}.</td>
                                    @foreach ($ui->columns as $attribute => $column)
                                        <td class="font-medium">
                                            {!! $ui->getAttribute($record, $attribute) !!}
                                        </td>
                                    @endforeach
                                    @if (count($ui->getActions()) > 0)
                                        <td class="font-medium">
                                            <div class="flex items-center gap-2">
                                                @foreach ($ui->getActions() as $component => $action)
                                                    @can($action['permission'])
                                                        @includeFirst([
                                                            "admin.$view.actions.$component",
                                                            "admin.layouts.components.actions.$component",
                                                            'admin.layouts.components.actions.default',
                                                        ])
                                                    @endcan
                                                @endforeach
                                            </div>
                                        </td>
                                    @endif
                                </tr>

                            @empty
                                <tr>
                                    <td colspan="{{ count($ui->columns) + 2 }}" class="text-center py-3">
                                        No data found
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
