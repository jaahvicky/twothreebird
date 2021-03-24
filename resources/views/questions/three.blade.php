@extends('layout.app')

@section('content')
<div class="title m-b-md hideField">
    <h3>Two Three Bird Question Three</h3>
    <p>Ballot box system for voting</p>
</div>
<div class="fluid-box">
    <div class="left-box">
        <form method="POST" id="voteForm" action="#" >
            @csrf
            <label for="fname">Candidate name:</label>
            <input type="text" id="fname" name="fname" required><br><br>
            <input type="submit" value="Vote">
        </form>
    </div>
    <div class="right-box">
        <div class="preview_vote_div">
            <table style="width:100%" >
                <tr>
                    <th>Candidate Name</th>
                    <th>Vote Count</th>
                </tr>
                <tbody class="candidateList">

                </tbody>
              </table>
              <p class="results">Winner: <span id="winnerId"></span></p>
        </div>
    </div>
</div>


@endsection


