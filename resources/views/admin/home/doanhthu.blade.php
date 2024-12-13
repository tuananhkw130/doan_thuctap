@extends('layouts.admin')

@section('content')
    <div class="container mt-4">
        <h2 class="mb-4" style="color: #5773ff">Doanh thu theo ngày / tháng</h2>
        <form method="GET" action="{{ route('admin.doanhthu') }}" class="form-inline mb-4">
            <div class="form-group mr-3">
                <label for="date" class="mr-2">Chọn ngày:</label>
                <input type="date" name="date" id="date" class="form-control" value="{{ request('date') }}">
            </div>
            <div class="form-group mr-3">
                <label for="month" class="mr-2">Chọn tháng:</label>
                <input type="month" name="month" id="month" class="form-control" value="{{ request('month') }}">
            </div>
            <button type="submit" class="btn btn-primary">Xem</button>
        </form>

        @if ($revenues->isNotEmpty())
            <table class="table">
                <thead>
                    <tr class="table-info">
                        <th class="text-center">Ngày</th>
                        <th class="text-center">Doanh thu (VND)</th>
                    </tr>
                </thead>
                <tbody style="background: #fbf0f1">
                    @foreach ($revenues as $revenue)
                        <tr>
                            <td class="text-center">{{ date('d/m/Y', strtotime($revenue->date)) }}</td>
                            <td class="text-center">{{ number_format($revenue->revenue, 0, ',', '.') }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @else
            <p class="text-center text-muted">Không có dữ liệu để hiển thị</p>
        @endif
    </div>
    <script>
        document.addEventListener('click', function(event) {
            const form = document.querySelector('form');
            const dateInput = document.getElementById('date');
            const monthInput = document.getElementById('month');

            if (!form.contains(event.target)) {
                dateInput.value = '';
                monthInput.value = '';
            }
        });
    </script>
@endsection
