# game_logic_simulator
Simulate a game between two users using design patterns

This project can be run from LAMP (or other) server configuration, with PHP 7.4.

A "user" is an object (specific type) with some properties (Health, Strength, Defence, Speed, Luck). 

The users levcels as arrays:
$HERO = ["health" => [70, 100], "strength" => [70, 80], "defence" => [45, 55], "speed" => [40, 50], "luck" => [10, 30]];
$THEBEAST = ["health" => [60, 90], "strength" => [60, 90], "defence" => [40, 60], "speed" => [40, 60], "luck" => [25, 40]];

Just one user have 2 skills, the hero, and these are used with a known fixed probability (RapidStrike 10% (this produce duble damage to the opponent), MagicShield 20% (this produce a half damage to the "hero" when is used)).

The game is running until a user die (Health <= 0) or the game get 20 runs (in Application.php we have a "for" statement for limited number of "games").

The first attack will start by the user with higher speed. If speed has the same value, the attack will start by the player with higher luck.

After each fight, the user role are changed: the attacker will be defender and the defender is attacker.

The formula for calculating dmage is: The DAMAGE = Attacker STRENGTH - Defender DEFENCE

Both users are instantiated with random values for Health, Strength, Speed etc. at every run.



The OUTPUT on screen show who attacked, what skill was used (if any), the damage done to the defender, the defender Health left.

