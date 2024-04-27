
<form id="addNewForm" method="POST">
@csrf
<div class="row-name">
    <label for="name">Name:
        <input type="text" name="name" id="name">
    </label>
</div>
<input type="submit" name="add" value="Add New">
</form>
<style>
    form
    {
        margin: 1%;
    }

    .row-name
    {
        margin-bottom: 3%;
        font-size: 16px;
        text-align: left;
        input:hover, textarea:hover {
            border: 1px solid pink;
        }
    }

    input[type="submit"] {
        background-color: lightpink;
        color: white;
        border: none;
        padding: 10px 20px;
        cursor: pointer;
        border-radius: 5px;
    }
</style>
