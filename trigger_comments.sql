CREATE TRIGGER remove_comments BEFORE DELETE
ON POST
	BEGIN
	DELETE FROM COMMENT
	WHERE postID IN (SELECT postID FROM COMMENT,POST
					 WHERE postID );
END;
