<?php
	session_start();

	function logUserIn($userId) {
		$_SESSION['logged-in-user'] = $userId; // Add data to session.
		$_SESSION['student'] = $userId;
		header('Location: index.html');// Headers before output
		exit(0);
	}

	function isLoggedIn() {
		return isset($_SESSION['logged-in-user']);
	}

	function logOut() {
		session_destroy();
		header('Location: login.html');
		exit(0);
	}
?>
