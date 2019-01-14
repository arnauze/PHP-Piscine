-- For each floor, display the floor_number in a ’floor’ column and nb_seats by floor
-- in a ’seats’ column. Ordered by floor with the highest number of seats to the floor with
-- the least number of seats.
SELECT floor_number AS floor, SUM(nb_seats) AS seats
FROM cinema
GROUP BY floor_number
ORDER BY SUM(nb_seats) DESC;