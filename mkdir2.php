<?php
/**
 * mkdir2
 * Avoid the warning message. In case of the folder already exists, it will skip the action
 * @param path
 */
function mkdir2($path) {
	if (!file_exists($path)) {
		mkdir($path);
	}
}
