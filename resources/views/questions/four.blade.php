@extends('layout.app')

@section('content')
<div class="title m-b-md hideField">
    <h3>Two Three Bird Question Four</h3>
    <p>Email Validation</p>
</div>
<div class="fluid-box">
    <div class="left-box">
        <form method="POST" id="emailForm" action="#" >
            @csrf
            <label for="fname">Email Address:</label>
            <input type="text" id="fname" name="fname" required><br><br>
            <p id="validation_message"></p>
            <input type="submit" value="Submit">
        </form>
    </div>
</div>


@endsection

