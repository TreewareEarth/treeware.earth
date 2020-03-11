<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Treeware - Package Not Found</title>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@tailwindcss/ui@latest/dist/tailwind-ui.min.css">


</head>
<body class="bg-gray-100">

<div class="container m-auto">

    <div class="mx-32 mt-32">
        <div class="bg-white shadow sm:rounded-lg">
            <div class="px-4 py-5 sm:p-6">
                <h3 class="text-lg leading-6 font-medium text-gray-900">
                    The package <strong>{{ $owner }}/{{ $package_name }}</strong> has not been added to the Treeware website yet.
                </h3>
                <div class="mt-2 max-w-xl text-sm leading-5 text-gray-500">
                    <p>
                        Once you have added the Treeware "conditions of use" to your package README. You can then add the package to the Treeware website. Once this has been done this link will work.
                    </p>
                </div>
                <div class="mt-5">
                    <a href="https://treeware.earth/#add-package-section" class="inline-flex items-center px-4 py-2 border border-gray-300 text-sm leading-5 font-medium rounded-md text-gray-700 bg-white hover:text-gray-500 focus:outline-none focus:border-blue-300 focus:shadow-outline-blue active:text-gray-800 active:bg-gray-50 transition ease-in-out duration-150">
                        Add package now
                    </a>

                    <a href="https://offset.earth/treeware?gift-trees" class="inline-flex items-center px-4 py-2 border border-gray-300 text-sm leading-5 font-medium rounded-md text-gray-700 bg-white hover:text-gray-500 focus:outline-none focus:border-blue-300 focus:shadow-outline-blue active:text-gray-800 active:bg-gray-50 transition ease-in-out duration-150">
                        Continue to Offset.Earth
                    </a>

                </div>
            </div>
        </div>
    </div>
</div>

</body>
</html>
