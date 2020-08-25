<?php
function getUserFromId($id, $connection) {
	$userResult = array();
	$stmt = $connection->prepare("SELECT * FROM users WHERE id = ?");
	$stmt->bind_param("i", $id);
	$stmt->execute();
	$result = $stmt->get_result();
	if($result->num_rows === 0) die('That user does not exist.');
	while($row = $result->fetch_assoc()) {
		$userResult = $row;
	}
	$stmt->close();

	return $userResult;
}

function validateMarkdown($comment) {
	$comment = htmlspecialchars($comment);
	$Parsedown = new Parsedown();
	$Parsedown->setSafeMode(true);

	return $Parsedown->line($comment);
}


function getUserFromUsername($username, $connection) {
	$userResult = array();
	$stmt = $connection->prepare("SELECT * FROM users WHERE username = ?");
	$stmt->bind_param("s", $username);
	$stmt->execute();
	$result = $stmt->get_result();
	if($result->num_rows === 0) die('That user does not exist.');
	while($row = $result->fetch_assoc()) {
		$userResult = $row;
	}
	$stmt->close();

	return $userResult;
}

function getPFP($user, $connection) {
	$stmt = $connection->prepare("SELECT * FROM users WHERE username = ?");
	$stmt->bind_param("s", $user);
	$stmt->execute();
	$result = $stmt->get_result();
	if($result->num_rows === 0) return('error');
	while($row = $result->fetch_assoc()) {
		$pfp = htmlspecialchars($row['pfp']);
	} 
	$stmt->close();
	return $pfp;
}


function getBobux($user, $connection) {
	$stmt = $connection->prepare("SELECT * FROM users WHERE username = ?");
	$stmt->bind_param("s", $user);
	$stmt->execute();
	$result = $stmt->get_result();
	if($result->num_rows === 0) return('error');
	while($row = $result->fetch_assoc()) {
		$bobux = $row['bobux'];
	} 
	$stmt->close();
	return $bobux;
}


function getLatestItem($itemType, $type, $username, $connection) {
	$itemResult = array();
	if($type == "id") {
		$stmt = $connection->prepare("SELECT * FROM files WHERE id = ? AND type = ? AND status = 'y' ORDER BY id DESC LIMIT 1");
		$stmt->bind_param("is", $username, $itemType);
		$stmt->execute();
		$result = $stmt->get_result();	
	} else if($type == "username") {
		$stmt = $connection->prepare("SELECT * FROM files WHERE author = ? AND type = ? AND status = 'y' ORDER BY id DESC LIMIT 1");
		$stmt->bind_param("ss", $username, $itemType);
		$stmt->execute();
		$result = $stmt->get_result();
	}
	
	if($result->num_rows === 0) return('Item doesnt exist.');
	while($row = $result->fetch_assoc()) {
		$itemResult = $row;
	}
	$stmt->close();

	return $itemResult;
}

function getID($user, $connection) {
	$stmt = $connection->prepare("SELECT * FROM users WHERE username = ?");
	$stmt->bind_param("s", $user);
	$stmt->execute();
	$result = $stmt->get_result();
	if($result->num_rows === 0) return 'error';
	while($row = $result->fetch_assoc()) {
		$id = $row['id'];
	} 
	$stmt->close();
	return $id;
}

function getFans($user, $connection) {
	$stmt = $connection->prepare("SELECT * FROM fan WHERE following = ?");
	$stmt->bind_param("s", $user);
	$stmt->execute();
	$result = $stmt->get_result();
	$fans = 0;
	while($row = $result->fetch_assoc()) {
		$fans++;
	} 
	$stmt->close();
	return $fans;
}

function getItem($id, $connection) {
	$itemResult = array();
	$stmt = $connection->prepare("SELECT * FROM files WHERE id = ? AND status = 'y'");
	$stmt->bind_param("s", $id);
	$stmt->execute();
	$result = $stmt->get_result();
	
	if($result->num_rows === 0) return('Item doesnt exist.');
	while($row = $result->fetch_assoc()) {
		$itemResult = $row;
	}
	$stmt->close();

	return $itemResult;
}

function getName($id, $connection) {
	$stmt = $connection->prepare("SELECT * FROM users WHERE id = ?");
	$stmt->bind_param("s", $id);
	$stmt->execute();
	$result = $stmt->get_result();
	if($result->num_rows === 0) return('error');
	while($row = $result->fetch_assoc()) {
		$name = htmlspecialchars($row['username']);
	} 
	$stmt->close();
	return $name;
}


function validateCSS($validate) {
	$DISALLOWED = array("<?php", "?>", ".php"); 

	$validated = str_replace($DISALLOWED, "", $validate);
    return $validated;
}
?>