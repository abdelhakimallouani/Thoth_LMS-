<!DOCTYPE html>
<html lang="fr" class="h-full bg-gray-50">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tableau de bord | Thoth</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="h-full">
    <nav class="bg-white border-b border-gray-200">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between h-16">
                <div class="flex items-center">
                    <span class="text-2xl font-bold text-indigo-600 tracking-tight">Thoth</span>
                </div>
                <div class="flex items-center gap-6">
                    <div class="hidden sm:flex flex-col text-right">
                        <span class="text-sm font-semibold text-gray-900"><?= htmlspecialchars($student['name']) ?></span>
                        <span class="text-xs text-gray-500">Étudiant</span>
                    </div>
                    <a href="/logout" class="inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md text-red-700 bg-red-50 hover:bg-red-100 transition">
                        Déconnexion
                    </a>
                </div>
            </div>
        </div>
    </nav>

    <main class="max-w-7xl mx-auto py-10 px-4 sm:px-6 lg:px-8">
        <div class="mb-10">
            <h1 class="text-3xl font-bold text-gray-900">Bienvenue, <?= htmlspecialchars($student['name']) ?> 👋</h1>
            <p class="mt-2 text-gray-600">Explorez vos cours et développez vos compétences.</p>
        </div>

        <div class="space-y-6">
            <div class="flex items-center justify-between">
                <h2 class="text-xl font-bold text-gray-800 flex items-center gap-2">
                    <svg class="h-6 w-6 text-indigo-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.246.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5s3.246.477 4.5 1.253v13C19.832 18.477 18.246 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path>
                    </svg>
                    Cours disponibles
                </h2>
                <span class="bg-indigo-100 text-indigo-700 text-xs font-bold px-3 py-1 rounded-full">
                    <?= count($courses) ?> modules
                </span>
            </div>

            <div class="grid grid-cols-1 gap-6 sm:grid-cols-2 lg:grid-cols-3">
                <?php foreach($courses as $course): ?>
                <div class="bg-white overflow-hidden shadow-sm hover:shadow-md transition-shadow border border-gray-200 rounded-xl flex flex-col">
                    <div class="p-6 flex-1">
                        <div class="flex items-center justify-between mb-3">
                            <span class="text-[10px] font-bold uppercase tracking-widest text-indigo-600 bg-indigo-50 px-2 py-1 rounded">Formation</span>
                        </div>
                        <h3 class="text-lg font-bold text-gray-900 mb-2">
                            <?= htmlspecialchars($course['title']) ?>
                        </h3>
                        <p class="text-gray-600 text-sm line-clamp-3">
                            <?= htmlspecialchars($course['description']) ?>
                        </p>
                    </div>
                    <div class="bg-gray-50 px-6 py-4 border-t border-gray-100">
                        <form action="/student/enroll" method="POST">
                            <input type="hidden" name="course_id" value="<?= $course['id'] ?>">
                            <button type="submit" class="w-full inline-flex justify-center items-center px-4 py-2 border border-transparent text-sm font-semibold rounded-lg text-white bg-indigo-600 hover:bg-indigo-700 transition">
                                S'inscrire au cours
                            </button>
                        </form>
                    </div>
                </div>
                <?php endforeach; ?>
                
                <?php if(empty($courses)): ?>
                <div class="col-span-full bg-white p-12 text-center rounded-xl border-2 border-dashed border-gray-300">
                    <p class="text-gray-500 italic">Aucun cours n'est disponible pour le moment.</p>
                </div>
                <?php endif; ?>
            </div>
        </div>
    </main>
</body>
</html>
