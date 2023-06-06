<?php
	session_start();

    // Store the session identifier of the user who initiated the logout
    $userSessionId = session_id();

    // Destroy the session only if the session identifier matches the user's session identifier
    if (session_id() === $userSessionId) {
        session_unset();
        session_destroy();
    }

    header("Location: ../");

?>