<!DOCTYPE html>
<html lang="fr" class="h-full bg-gray-50">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inscription | Thoth LMS</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="h-full">
    <div class="min-h-full flex flex-col justify-center py-12 sm:px-6 lg:px-8">
        <div class="sm:mx-auto sm:w-full sm:max-w-md">
            <div class="flex justify-center mb-4">
                <div class="bg-indigo-600 p-2 rounded-lg">
                    <svg class="h-8 w-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.246.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5s3.246.477 4.5 1.253v13C19.832 18.477 18.246 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path>
                    </svg>
                </div>
            </div>
            <h2 class="text-center text-3xl font-extrabold text-gray-900">Rejoindre Thoth</h2>
            <p class="mt-2 text-center text-sm text-gray-600">
                Commencez votre apprentissage dès aujourd'hui
            </p>
        </div>

        <div class="mt-8 sm:mx-auto sm:w-full sm:max-w-md">
            <div class="bg-white py-8 px-4 shadow-xl shadow-gray-200/50 sm:rounded-xl sm:px-10 border border-gray-100">
                
                <form method="POST" action="/register" class="space-y-5">
                    <div>
                        <label for="name" class="block text-sm font-semibold text-gray-700">Nom complet</label>
                        <div class="mt-1">
                            <input id="name" name="name" type="text" required 
                                class="appearance-none block w-full px-3 py-2 border border-gray-300 rounded-lg placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-transparent transition duration-150"
                                placeholder="Jean Dupont">
                        </div>
                    </div>

                    <div>
                        <label for="email" class="block text-sm font-semibold text-gray-700">Adresse Email</label>
                        <div class="mt-1">
                            <input id="email" name="email" type="email" autocomplete="email" required 
                                class="appearance-none block w-full px-3 py-2 border border-gray-300 rounded-lg placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-transparent transition duration-150"
                                placeholder="jean@exemple.fr">
                        </div>
                    </div>

                    <div>
                        <label for="password" class="block text-sm font-semibold text-gray-700">Mot de passe</label>
                        <div class="mt-1">
                            <input id="password" name="password" type="password" required 
                                class="appearance-none block w-full px-3 py-2 border border-gray-300 rounded-lg placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-transparent transition duration-150"
                                placeholder="••••••••">
                        </div>
                        <p class="mt-1 text-xs text-gray-500 italic">Doit contenir au moins 8 caractères.</p>
                    </div>

                    <div class="pt-2">
                        <button type="submit" 
                            class="w-full flex justify-center py-2.5 px-4 border border-transparent rounded-lg shadow-sm text-sm font-bold text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 transition-all duration-200 transform hover:scale-[1.02]">
                            Créer mon compte
                        </button>
                    </div>
                </form>

                <div class="mt-6 border-t border-gray-100 pt-6">
                    <div class="text-sm text-center">
                        <span class="text-gray-600">Vous avez déjà un compte ?</span>
                        <a href="/login" class="ml-1 font-bold text-indigo-600 hover:text-indigo-500 transition-colors">
                            Connectez-vous ici
                        </a>
                    </div>
                </div>
            </div>

            <p class="mt-8 text-center text-xs text-gray-400">
                &copy; 2026 Thoth LMS. Tous droits réservés.
            </p>
        </div>
    </div>
</body>
</html>