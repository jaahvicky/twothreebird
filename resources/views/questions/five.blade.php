@extends('layout.app')

@section('content')
<div class="title m-b-md hideField">
    <h3>Two Three Bird Question Five</h3>
    <p>Movie Search</p>
</div>
<div class="fluid-box">
    <div class="">
        <form method="POST" id="movieForm" action="#" >
            @csrf
            <label for="fname">Movie Name:</label>
            <input type="text" id="fname" name="fname" required><br><br>
            <p id="validation_message"></p>
            <input type="submit" value="Search">
        </form>
    </div>

</div>
<div >
   <ul id="movieList">
   </ul>
</div>

@endsection
