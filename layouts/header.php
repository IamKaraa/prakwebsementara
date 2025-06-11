<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>GuestBook</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
      .header-scrolled {
        background-color: white;
        box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
      }
    </style>
  </head>
  <body class="font-sans text-gray-900 bg-gray-100">
    <!-- Header -->
    <header
      id="header"
      class="w-full fixed top-0 left-0 z-50 transition-all duration-300"
    >
      <div class="flex justify-between items-center px-8 py-4 bg-gradient-to-r from-blue-500 to-blue-700 text-white">
        <div class="text-2xl font-bold">GuestBook</div>
        <nav class="space-x-6 text-lg font-semibold">
          <a href="#home" class="hover:underline">Home</a>
          <a href="#about" class="hover:underline">About</a>
          <a href="#contact" class="hover:underline">Contact</a>
        </nav>
      </div>
    </header>
    <div class="pt-24">
