<form method="post" action="editPerson.php">

    <input type="hidden" name="id" value="<?php echo isset($person) ? $person->getId() : null ?>">

    <label for="name">Name</label>
    <input type="text" name="name" id="name" value="<?php echo isset($person) ? $person->getName() : null ?>">

    <label for="surname">Surname</label>
    <input type="text" name="surname" id="surname" value="<?php echo isset($person) ? $person->getSurname() : null ?>">

    <input type="submit">
</form>