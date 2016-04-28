insert into t_hotels values (
  1, 'Le Domaine des Monédières', 'Meyrignac-l\'Eglise', 3
);
insert into t_hotels values (
  2, 'Le Chateau de Marsac', 'Meyssac', 5
);
insert into t_hotels values (
  3, 'Inter-hôtel Tulle Centre', 'Tulle', 3
);
insert into t_hotels values (
  4, 'Hôtel Joyet de Maubec', 'Uzerche', 4
);



/* raw password is 'john' */
insert into t_users values
(1, 'JohnDoe', 'L2nNR5hIcinaJkKR+j4baYaZjcHS0c3WX2gjYF6Tmgl1Bs+C9Qbr+69X8eQwXDvw0vp73PrcSeT0bGEW5+T2hA==', 'YcM=A$nsYzkyeDVjEUa7W9K', 'ROLE_USER');
/* raw password is 'jane' */
insert into t_users values
(2, 'JaneDoe', 'EfakNLxyhHy2hVJlxDmVNl1pmgjUZl99gtQ+V3mxSeD8IjeZJ8abnFIpw9QNahwAlEaXBiQUBLXKWRzOmSr8HQ==', 'dhMTBkzwDKxnD;4KNs,4ENy', 'ROLE_USER');



insert into t_comments values
(1, 'Great! Keep up the good work.', 1, 1);
insert into t_comments values
(2, "Thank you, I'll try my best.", 3, 2);
