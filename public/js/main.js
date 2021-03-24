$(document).ready(function () {
    // Question three
    var candidates = [];
    $("#voteForm").on("submit", function (e) {
        e.preventDefault();
        candidates.push($("#fname").val());
        $(".candidateList").html("");
        $("#winnerId").html("");
        electionWinner();
        $("#fname").val("");
    });
    function electionWinner() {
        var result = {};
        var CountList = [];
        for (var i = 0; i < candidates.length; ++i) {
            if (!result[candidates[i]]) {
                result[candidates[i]] = 1;
            } else {
                ++result[candidates[i]];
            }

            const found = CountList.some((el) => el.name === candidates[i]);
            if (!found) {
                CountList.push({
                    name: candidates[i],
                    votes: result[candidates[i]],
                });
            } else {
                var objIndex = CountList.findIndex(
                    (obj) => obj.name == candidates[i]
                );
                CountList[objIndex].votes = result[candidates[i]];
            }
        }
        var candidateList = CountList.sort((a, b) =>
            a.name.localeCompare(b.name)
        );
        candidateList = candidateList.sort((a, b) => b.votes - a.votes);
        for (let index = 0; index < candidateList.length; index++) {
            const element = candidateList[index];
            var htmlElement =
                "<tr><td>" +
                element.name +
                "</td><td>" +
                element.votes +
                "</td></tr>";
            $(".candidateList").append(htmlElement);
        }
        $("#winnerId").html(candidateList[0].name);
        if (candidateList.length > 1) {
            $(".results").show();
        }
    }

    //question four
    var reqex = /^[a-z]{1,6}_?\d{0,4}@twothreebird.com$/;
    $("#emailForm").on("submit", function (e) {
        e.preventDefault();
        $("#validation_message").html("");
        var email = $("#fname").val();
        if (reqex.test(String(email).toLowerCase())) {
            $("#validation_message").html("The Email address is valid");
        } else {
            $("#validation_message").html("The Email address is invalid");
        }
    });

    //question five
    $("#movieForm").on("submit", function (e) {
        e.preventDefault();
        $("#validation_message").html("");
        $("#movieList").html("");
        var title = $("#fname").val();
        if (String(title).toLowerCase().length > 0) {
            getMovieTitles(title);
            $("#fname").val("");
        } else {
            $("#validation_message").html("The Title is required");
        }
    });

    function getMovieTitles(title) {
        var movies = [];
        $.ajax({
            type: "Get",
            url: "https://www.omdbapi.com/?s=" + title + "&apikey=1763074f",
            success: function (res) {
                if (res.Response === "True") {
                    for (const movie of res.Search) {
                        movies.push({ title: movie.Title });
                    }
                    movies = movies.sort((a, b) =>
                        a.title.localeCompare(b.title)
                    );
                    for (const movie of movies) {
                        var element = `<li>${movie.title}</li>`;
                        $("#movieList").append(element);
                    }
                } else {
                    $("#validation_message").html(res.Error);
                }
            },
        });
    }
});
