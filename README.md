
J1: Your HomeController is not a resource controller. Name two things an index() on a resource controller does that yours does not have to.  
    
    A resource controller's `index()` usually handles resource listing and may include additional resource-related routes and actions. My `HomeController` only displays the home page, so it does not need those extra actions.

J2: Your pagination links lost the search term until you added one method. Say what those links  contained before, and what the controller therefore received.
    
    Before adding `withQueryString()`, pagination links contained only the page number. The controller therefore received no search or filter values when moving to another page.

J3:	A misspelled sort value does not break your page. Explain why that is worse than an error, and what your allowed list does about it.

    A misspelled sort value can silently produce incorrect or unsorted results without showing an error. The allowed list checks the requested column and replaces invalid values with the default `code` column.








