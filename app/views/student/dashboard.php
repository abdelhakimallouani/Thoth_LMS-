<!DOCTYPE html>
<html lang="fr" class="h-full bg-gray-50">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tableau de bord | Thoth LMS</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="h-full">

    <nav class="bg-white border-b border-gray-200 sticky top-0 z-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between h-16">
                <div class="flex items-center">
                    <span class="text-2xl font-black text-indigo-600 tracking-tighter">THOTH</span>
                </div>
                <div class="flex items-center gap-6">
                    <div class="hidden sm:flex flex-col text-right">
                        <span class="text-sm font-bold text-gray-900"><?= htmlspecialchars($student['name']) ?></span>
                        <span class="text-xs text-indigo-500 font-medium italic">Étudiant</span>
                    </div>
                    <a href="/logout" class="px-4 py-2 text-sm font-semibold text-red-600 bg-red-50 rounded-lg hover:bg-red-100 transition">
                        Déconnexion
                    </a>
                </div>
            </div>
        </div>
    </nav>

    <main class="max-w-7xl mx-auto py-10 px-4 sm:px-6 lg:px-8">

        <div class="mb-12">
            <h1 class="text-4xl font-extrabold text-gray-900 tracking-tight">Bonjour, <?= htmlspecialchars($student['name']) ?> 👋</h1>
            <p class="mt-2 text-lg text-gray-600">Prêt à continuer votre apprentissage aujourd'hui ?</p>
        </div>

        <section class="mb-16">
            <?php if (!empty($_SESSION['error'])): ?>
                <div class="bg-red-100 text-red-700 p-3 rounded mb-4">
                    <?= $_SESSION['error'];
                    unset($_SESSION['error']); ?>
                </div>
            <?php endif; ?>

            <?php if (!empty($_SESSION['success'])): ?>
                <div class="bg-green-100 text-green-700 p-3 rounded mb-4">
                    <?= $_SESSION['success'];
                    unset($_SESSION['success']); ?>
                </div>
            <?php endif; ?>

            <div class="flex items-center gap-3 mb-8">
                <div class="p-2 bg-emerald-100 rounded-lg">
                    <svg class="h-6 w-6 text-emerald-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                </div>
                <h2 class="text-2xl font-bold text-gray-800">Mes Formations</h2>
            </div>

            <div class="grid grid-cols-1 gap-8 sm:grid-cols-2 lg:grid-cols-3">
                <?php if (!empty($my_courses)): ?>
                    <?php foreach ($my_courses as $course): ?>
                        <div class="bg-white rounded-2xl shadow-sm border border-emerald-100 hover:shadow-md transition-all group">
                            <div class="p-6">
                                <div class="flex justify-between items-start mb-4">
                                    <span class="px-2.5 py-0.5 rounded-full text-xs font-medium bg-emerald-100 text-emerald-800">Inscrit</span>
                                </div>
                                <h3 class="text-xl font-bold text-gray-900 mb-2"><?= htmlspecialchars($course['title']) ?></h3>
                                <p class="text-gray-500 text-sm line-clamp-2 mb-6"><?= htmlspecialchars($course['description']) ?></p>
                                <a href="/student/course/<?= $course['id_course'] ?>" class="flex items-center justify-center w-full px-4 py-3 bg-gray-900 text-white text-sm font-bold rounded-xl hover:bg-indigo-600 transition duration-300">
                                    Accéder au cours
                                </a>
                            </div>
                        </div>
                    <?php endforeach; ?>
                <?php else: ?>
                    <div class="col-span-full py-12 text-center bg-gray-100 rounded-3xl border-2 border-dashed border-gray-300">
                        <p class="text-gray-500 font-medium">Vous n'êtes inscrit à aucun cours pour le moment.</p>
                        <a href="#all-courses" class="mt-4 inline-block text-indigo-600 font-bold hover:underline">Découvrir le catalogue ↓</a>
                    </div>
                <?php endif; ?>
            </div>
        </section>

        <hr class="border-gray-200 mb-16">

        <section id="all-courses">
            <div class="flex items-center gap-3 mb-8">
                <div class="p-2 bg-indigo-100 rounded-lg">
                    <svg class="h-6 w-6 text-indigo-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.246.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5s3.246.477 4.5 1.253v13C19.832 18.477 18.246 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path>
                    </svg>
                </div>
                <h2 class="text-2xl font-bold text-gray-800">Catalogue des cours</h2>
            </div>

            <div class="grid grid-cols-1 gap-8 sm:grid-cols-2 lg:grid-cols-3">
                <?php if (!empty($courses)): ?>
                    <?php foreach ($courses as $course): ?>
                        <div class="group bg-white rounded-2xl shadow-sm border border-gray-200 overflow-hidden hover:border-indigo-300 transition-all duration-300">
                            <div class="p-6 h-full flex flex-col">
                                <h3 class="text-xl font-bold text-gray-900 group-hover:text-indigo-600 transition-colors mb-3">
                                    <?= htmlspecialchars($course['title']) ?>
                                </h3>
                                <p class="text-gray-500 text-sm line-clamp-3 mb-6 flex-grow">
                                    <?= htmlspecialchars($course['description']) ?>
                                </p>

                                <div class="space-y-3">
                                    <a href="/student/course/<?= $course['id_course'] ?>" class="block text-center text-indigo-600 text-sm font-bold py-2 border border-indigo-100 rounded-lg hover:bg-indigo-50 transition">
                                        Voir les détails
                                    </a>
                                    <form action="/student/dashboard" method="POST">
                                        <input type="hidden" name="course_id" value="<?= $course['id_course'] ?>">
                                        <button type="submit" class="w-full px-4 py-3 bg-indigo-600 text-white font-bold rounded-xl hover:bg-indigo-700 shadow-md shadow-indigo-100 transition">
                                            S'inscrire
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                <?php else: ?>
                    <p class="col-span-full text-center text-gray-400 py-10 italic">Aucun nouveau cours disponible.</p>
                <?php endif; ?>
            </div>
        </section>

    </main>


</body>

</html>