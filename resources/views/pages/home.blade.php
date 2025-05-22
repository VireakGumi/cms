<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body
    @foreach ($data as $item)
        @if ($item['gender'] == "F")
            <h1>hello, {{ $item['name'] }}  welcome to laravel</h1>
            <p>you're @php echo $item['age'] @endphp and @php echo $item['gender'] @endphp</p>
        @else 
            <h1>you are a man</h1>
        @endif
    @endforeach

    @foreach ($data as $item)
        @if ($item['age'] >= 20)
            <h2>Hello, @php echo $item['name'] @endphp you are old now</h2>
        @elseif($item['age'] <= 10)
            <h2>Hello, @php echo $item['name'] @endphp you are too young</h2>
        @elseif($item['age'] < 0)
            <h2>Hello, @php echo $item['name'] @endphp you are not even born yet</h2>
        @endif
    @endforeach

    @foreach ($data as $item)
        @switch($item['gender'])
            @case('F')
                <h1>hello, @php echo $item['name'] @endphp welcome to laravel</h1>
                <p>you're @php echo $item['age'] @endphp and @php echo $item['gender'] @endphp</p>
                @break
            @case("M")
                <h1>you are a man</h1>
                @break
            @default
                <h1>Other</h1>
                @break
        @endswitch
    @endforeach
    
</body>

</html>
