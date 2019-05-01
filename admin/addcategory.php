<?php $page_name = "Add Category";require "inc/header.php";?>

<div class="right">
    <h1><?php echo $page_name; ?></h1>
    <div class="form">
        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
            <table>
                <tr>
                    <td>
                        <label>category</label>
                    </td>
                    <td>
                        <input type="text" name="cat">
                    </td>
                </tr>
                <tr>
                    <td>
                        <input type="reset" value="reset" class="reset">
                    </td>
                    <td>
                        <input type="submit" value="insert new category" name="submit-insert">
                    </td>
                </tr>
            </table>
        </form>
    </div>
</div>

<?php require "inc/footer.php";?>