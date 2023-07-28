<!DOCTYPE html>
<html>
<head>
    <title>Search Results</title>
    <style>
        .hidden {
            display: none;
        }
    </style>
</head>
<body>

    <h1>Sila Masukkan No Kad Pengenalan Anda</h1>

    <form id="searchForm" action="{{ route('search') }}" method="GET">
        <input type="text" name="keyword" placeholder="Search by NOKP" value="{{ $keyword }}">
        <button type="submit">Search</button>
    </form>

    <table id="resultsTable" class="hidden">
        <thead>
            <tr>
                <th>NO Kad Pengenalan</th>
                <th>Nama</th>
                <!-- Add other attributes you want to display -->
            </tr>
        </thead>
        <tbody>

            @if(isset($petanibajak))
                @foreach($petanibajak as $item)
                    <tr>
                        <td>{{ $item->nokp }}</td>
                        <td>{{ $item->nama }}</td>
                        <!-- Add other attributes you want to display -->
                    </tr>
                @endforeach
            @endif

        </tbody>
    </table>

    <p id="noResultsMessage" class="hidden">No Pengenalan belum wujud.</p>
    <p id="existingResultsMessage" class="hidden">No Pengenalan sudah wujud! Sila Daftar email dan kata laluan anda di sini:</p>
    <a id="registerButton" href="{{ route('register') }}" class="btn btn-success hidden">Daftar</a>

    <script>
        document.getElementById("searchForm").addEventListener("submit", function(event) {
            event.preventDefault(); // Prevent form submission
            showTable();
        });

        function showTable() {
            var table = document.getElementById("resultsTable");
            var noResultsMessage = document.getElementById("noResultsMessage");
            var existingResultsMessage = document.getElementById("existingResultsMessage");
            var registerButton = document.getElementById("registerButton");

            table.classList.remove("hidden");
            noResultsMessage.classList.add("hidden");
            existingResultsMessage.classList.add("hidden");
            registerButton.classList.add("hidden");

            if (table.rows.length === 1) {
                noResultsMessage.classList.remove("hidden");
            } else {
                existingResultsMessage.classList.remove("hidden");
                registerButton.classList.remove("hidden");
            }
        }
    </script>

</body>
</html>
