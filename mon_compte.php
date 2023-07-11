<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Profile</title>
    <link rel="stylesheet" type="text/css" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.0.2/css/bootstrap.min.css">
</head>
<style type="text/css">
    body {
        margin-top: 20px;
        background: #eee;
    }

    .avatar.xl {
        width: 5rem;
        height: 5rem;
        font-size: 1.09375rem;
    }

    .avatar img {
        max-width: 100%;
        display: block;
    }

    .rounded-circle {
        border-radius: 50%!important;
    }

    .rounded-circle {
        border-radius: 50%!important;
    }

    .bg-opacity-10 {
        --bs-bg-opacity: 0.1;
    }

    .bg-gray {
        --bs-bg-opacity: 1;
        background-color: rgba(var(--bs-gray-rgb),var(--bs-bg-opacity))!important;
    }

    .p-1 {
        padding: 0.25rem!important;
    }

    .mt-n5 {
        margin-top: -1.5rem!important;
    }

    .mx-auto {
        margin-right: auto!important;
        margin-left: auto!important;
    }

    .position-relative {
        position: relative!important;
    }

    .d-block {
        display: block!important;
    }

    a {
        color: var(--bs-link-color);
        text-decoration: none;
    }

</style>
<body>
    <?php
    // Tableau des utilisateurs
    $users = [
        [
            'name' => 'ousmane sarr',
            'avatar' => 'https://bootdey.com/img/Content/avatar/avatar1.png',
            'followers' => 2345,
            'following' => 54,
            'join_date' => 'April 2021',
            'location' => 'fatick, senegal',
            'online' => true
        ],
        [
            'name' => 'madiagne fall',
            'avatar' => 'https://bootdey.com/img/Content/avatar/avatar2.png',
            'followers' => 1678,
            'following' => 98,
            'join_date' => 'June 2022',
            'location' => 'sangalkam, senegal',
            'online' => false
        ]
    ];

    // Variables pour la modification du profil
    $updatedName = '';
    $updatedLocation = '';

    // Traitement du formulaire de modification du profil
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        if (isset($_POST['edit'])) {
            $userId = $_POST['user_id'];

        }
    }
    ?>

    <div class="container">
        <div class="row">
            <?php foreach ($users as $userId => $user) : ?>
                <div class="col-xl-4 col-md-4 mb-3 mb-lg-5">
                    <!--Card-->
                    <div class="card overflow-hidden text-center">
                        <img src="https://www.bootdey.com/image/280x120/6495ED/000000" class="card-img-top img-fluid" alt="">

                        <!--Card body-->
                        <div class="card-body p-0">
                            <!--avatar-->
                            <a href="#!.html" class="avatar xl rounded-circle bg-gray bg-opacity-10 p-1 position-relative mt-n5 d-block mx-auto">
                                <img src="<?php echo $user['avatar']; ?>" class="avatar-img img-fluid rounded-circle" alt="">
                            </a>
                            <h5 class="mb-0 pt-3">
                                <a href="#!.html" class="text-reset"><?php echo $user['name']; ?></a>
                            </h5>
                            <span class="text-muted small d-block mb-4">Full stack developer</span>
                            <div class="row mx-0 border-top border-bottom">
                                <div class="col-6 text-center border-end py-3">
                                    <h5 class="mb-0"><?php echo $user['followers']; ?></h5>
                                    <small class="text-muted">Followers</small>
                                </div>
                                <div class="col-6 text-center py-3">
                                    <h5 class="mb-0"><?php echo $user['following']; ?></h5>
                                    <small class="text-muted">Following</small>
                                </div>
                            </div>
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item px-3 d-flex align-items-center justify-content-between">
                                    <span class="text-muted small">Join</span>
                                    <strong><?php echo $user['join_date']; ?></strong>
                                </li>
                                <li class="list-group-item px-3 d-flex align-items-center justify-content-between">
                                    <span class="text-muted small">Location</span>
                                    <?php if ($updatedName === $user['name']) : ?>
                                        <form method="POST">
                                            <input type="hidden" name="user_id" value="<?php echo $userId; ?>">
                                            <input type="text" name="location" value="<?php echo $updatedLocation; ?>" required>
                                            <button type="submit" name="edit" class="btn btn-sm btn-primary">Save</button>
                                        </form>
                                    <?php else : ?>
                                        <strong><?php echo $user['location']; ?></strong>
                                        <form method="POST">
                                            <input type="hidden" name="user_id" value="<?php echo $userId; ?>">
                                            <button type="submit" name="edit" class="btn btn-sm btn-primary">Edit</button>
                                        </form>
                                    <?php endif; ?>
                                </li>
                                <li class="list-group-item px-3 d-flex align-items-center justify-content-between">
                                    <span class="text-muted small d-flex align-items-center">
                                        <span class="align-middle lh-1 me-1 size-5 border border-4 border-success rounded-circle d-inline-block"></span>
                                        <?php echo $user['online'] ? 'Online' : 'Offline'; ?>
                                    </span>
                                    <div class="text-end">
                                        <a href="#!.html" class="btn btn-sm btn-primary">Follow</a>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>

</body>
</html>
