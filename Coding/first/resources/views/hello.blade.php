<!DOCTYPE html>
<html>
<head>
    <title>Passing Data to Blade</title>
</head>
<body>
<!--passing data to view
1. Array->associative array with key value pair
2. with() method->with('key','value')
3. compact() method->compact('variable name')
4.withname() method->withName('$name')->withId('$id')->withAddress('$address')-->
    <h1>Passing Data to View</h1>
    <hr>
    <h2>1. Using Associative Array</h2>
    <p>Name: {{ $name ?? 'Amish' }}</p>
    <p>ID: {{ $id ?? '555' }}</p>
    <p>Address: {{ $address ?? 'LPU' }}</p>
    <hr>
    <h2>2. Using with() method</h2>
    <p>Name: {{ $name_with ?? 'Amish' }}</p>
    <hr>
    <h2>3. Using compact() method</h2>
    <p>City: {{ $city ?? 'Phagwara' }}</p>
    <hr>
    <h2>4. Using withName() method</h2>
    <p>Name: {{ $withName ?? 'Amish' }}</p>
    <p>ID: {{ $withId ?? '555' }}</p>
    <p>Address: {{ $withAddress ?? 'Phagwara' }}</p>
</body>
</html>

