<?php require "inc/header.php";?>

<?php

if (isset($_SESSION['u_type'])) {
    if ($_SESSION['u_type'] == 'admin') {
        header('Location: admin/');
    }
}

?>

<h1>Lorem ipsum dolor sit amet consectetur adipisicing elit. Hic, laudantium officia. A error, eos quibusdam magni voluptas eligendi officiis nobis delectus reprehenderit laboriosam facere ipsam veritatis quia voluptate ipsum dolorem illum tempora accusantium natus aspernatur. Optio ratione impedit molestiae odit debitis exercitationem est eos! Iusto beatae quasi aliquid reiciendis neque quos laborum earum, quas vero tenetur voluptate optio ratione atque dolores nesciunt blanditiis autem culpa ab. Dolores hic modi vero laudantium distinctio exercitationem blanditiis consectetur odio. Laboriosam voluptatem voluptatum libero, adipisci odio dolorem a veniam dolor unde ab aspernatur incidunt in eligendi ducimus cum fuga ex nemo? Corporis quidem minus consectetur nam sint non aperiam rem id vitae quos velit dolor amet ipsam quod ratione pariatur exercitationem facere, in ea officia voluptates repellat! Ex voluptate corporis dolorem perspiciatis reprehenderit officia facilis dolore assumenda. Fugiat, odit minus dolore ipsa eius excepturi? Ipsum at distinctio, earum dicta ullam quaerat sunt architecto eius. Perferendis expedita corrupti rerum vitae et quo nesciunt sed consequuntur dignissimos beatae, provident vero incidunt molestias ratione doloribus voluptatem itaque iste quasi cupiditate facere. Modi suscipit quam blanditiis voluptatum rerum distinctio quae unde minus nihil ducimus soluta molestias fugit eius, nisi, quibusdam consectetur exercitationem itaque ex accusantium vel necessitatibus incidunt?</h1>

<?php require "inc/footer.php";?>