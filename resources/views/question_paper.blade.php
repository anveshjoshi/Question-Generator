
<h1 style="text-align: center">Question Paper</h1>
<hr>

@foreach($getRandomQuestion as $row)
    <h2> Q. No. {{ $loop->iteration }}. {{ $row->question }} <br></h2>
@endforeach
