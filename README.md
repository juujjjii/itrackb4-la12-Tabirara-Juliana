
H1. The top of your error page named a file inside vendor. Say why that was not where your mistake was, and where the page showed you it actually was.
    The top of the page named a file inside `vendor` because that is where Laravel stopped: my call to `withh()` reached Laravel's own code, which found no such method and gave up there. My mistake was in `app\Http\Controllers\SubjectsController.php`, in `index()`, which the page showed in the frame it had already opened for me, with my line marked.

**H2.** You wrote one Log::info line with a context array. Name something it will tell you next month that the error page could not.
    My `Log::info('Subject saved', ['id' => ...])` line will tell me next month which subject was saved and when, for example that subject 7 was added on a particular day. The error page can't do that, because it only appears when something fails and only to whoever is looking at that moment, and it never records a save that worked.

**H3.**Your guard answers with 403 instead of redirecting back with a message. Say when each of the two is the better answer.
     A 403 is better when the request should never have been made, for example someone typing the delete address by hand to remove the last subject of a prerequisite. A redirect with a message is better when a visitor did something reasonable that just didn't work, like clicking a visible Delete button in good faith, because they deserve to be told why.