<!DOCTYPE html>
<html lang="fr" class="h-full bg-gray-50">
<head>
    <meta charset="UTF-8">
    <title><?= htmlspecialchars($course['title']) ?> | Thoth</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="h-full">

    <main class="max-w-4xl mx-auto py-12 px-4">
        <div class="bg-white rounded-3xl shadow-sm border border-gray-200 overflow-hidden">
            <div class="h-48 bg-indigo-600 flex items-center justify-center">
                <h1 class="text-4xl font-bold text-white px-6 text-center"><?= htmlspecialchars($course['title']) ?></h1>
            </div>
            
            <div class="p-8">
                <div class="flex justify-between items-start mb-6">
                    <div>
                        <h2 class="text-xl font-semibold text-gray-900">À propos de ce cours</h2>
                        <p class="mt-4 text-gray-600 leading-relaxed text-lg">
                            <?= htmlspecialchars($course['description'])?>
                        </p>
                    </div>
                </div>

            </div>
        </div>
    </main>
</body>
</html>