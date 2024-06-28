<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>CSV Comparator - Results</title>
    @vite('resources/css/styles.css')
</head>
<body>
    <div class="container">
        <h1>CSV Comparator Results</h1>

        <h2>Identical Rows {{ count($differences['identical']) }}</h2>
        @if (count($differences['identical']) > 0)
            <table>
                <thead>
                    <tr>
                        <th>Old Data (Line)</th>
                        <th>New Data (Line)</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($differences['identical'] as $pair)
                        <tr>
                            <td>
                                <strong>Line {{ $pair['old']['index'] + 1 }}:</strong>
                                <div class="nested-table-container">
                                    <table class="nested-table">
                                        <thead>
                                            <tr>
                                                @foreach (array_keys($pair['old']['data']) as $key)
                                                    <th>{{ $key }}</th>
                                                @endforeach
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                @foreach ($pair['old']['data'] as $value)
                                                    <td>{{ $value }}</td>
                                                @endforeach
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </td>
                            <td>
                                <strong>Line {{ $pair['new']['index'] + 1 }}:</strong>
                                <div class="nested-table-container">
                                    <table class="nested-table">
                                        <thead>
                                            <tr>
                                                @foreach (array_keys($pair['new']['data']) as $key)
                                                    <th>{{ $key }}</th>
                                                @endforeach
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                @foreach ($pair['new']['data'] as $value)
                                                    <td>{{ $value }}</td>
                                                @endforeach
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @else
            <p>No identical rows found.</p>
        @endif

        <h2>Updated Rows {{ count($differences['updated']) }}</h2>
        @if (count($differences['updated']) > 0)
            <table>
                <thead>
                    <tr>
                        <th>Old Data (Line)</th>
                        <th>New Data (Line)</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($differences['updated'] as $pair)
                        <tr>
                            <td>
                                <strong>Line {{ $pair['old']['index'] + 1 }}:</strong>
                                <div class="nested-table-container">
                                    <table class="nested-table">
                                        <thead>
                                            <tr>
                                                @foreach (array_keys($pair['old']['data']) as $key)
                                                    <th>{{ $key }}</th>
                                                @endforeach
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                @foreach ($pair['old']['data'] as $value)
                                                    <td>{{ $value }}</td>
                                                @endforeach
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </td>
                            <td>
                                <strong>Line {{ $pair['new']['index'] + 1 }}:</strong>
                                <div class="nested-table-container">
                                    <table class="nested-table">
                                        <thead>
                                            <tr>
                                                @foreach (array_keys($pair['new']['data']) as $key)
                                                    <th>{{ $key }}</th>
                                                @endforeach
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                @foreach ($pair['new']['data'] as $value)
                                                    <td>{{ $value }}</td>
                                                @endforeach
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @else
            <p>No updated rows found.</p>
        @endif

        <h2>Added Rows {{ count($differences['added']) }}</h2>
        @if (count($differences['added']) > 0)
            <table>
                <thead>
                    <tr>
                        <th>New Data (Line)</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($differences['added'] as $pair)
                        <tr>
                            <td>
                                <strong>Line {{ $pair['new']['index'] + 1 }}:</strong>
                                <div class="nested-table-container">
                                    <table class="nested-table">
                                        <thead>
                                            <tr>
                                                @foreach (array_keys($pair['new']['data']) as $key)
                                                    <th>{{ $key }}</th>
                                                @endforeach
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                @foreach ($pair['new']['data'] as $value)
                                                    <td>{{ $value }}</td>
                                                @endforeach
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @else
            <p>No added rows found.</p>
        @endif

        <a href="{{ url('/') }}">Go back</a>
    </div>
</body>
</html>
