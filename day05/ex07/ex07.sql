-- Display the title and summary of all movies containing 42 in their title
-- or summary ordered from the shortest film to the longest.
SELECT title, summary FROM film WHERE summary LIKE '%42%' OR title LIKE '%42%' ORDER BY duration ASC;