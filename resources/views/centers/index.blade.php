<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FitSphere Centers | Find a Gym</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600;800&display=swap');
        body { font-family: 'Inter', sans-serif; background-color: #0f172a; color: #f8fafc; }
        .glass { background: rgba(30, 41, 59, 0.7); backdrop-filter: blur(10px); border: 1px solid rgba(255,255,255,0.1); }
        .gradient-text { background: linear-gradient(90deg, #3b82f6, #06b6d4); -webkit-background-clip: text; -webkit-text-fill-color: transparent; }
    </style>
</head>
<body class="antialiased min-h-screen flex flex-col items-center py-20 px-6">
    <header class="text-center mb-16 max-w-2xl">
        <h1 class="text-5xl font-extrabold mb-6">Discover <span class="gradient-text">FitSphere Centers</span></h1>
        <p class="text-lg text-slate-400">Find state-of-the-art fitness studios near you. Premium equipment, expert trainers, and a thriving community.</p>
    </header>

    <div class="grid grid-cols-1 md:grid-cols-2 gap-10 max-w-6xl w-full">
        @forelse($centers as $center)
            <div class="glass rounded-3xl overflow-hidden group hover:shadow-2xl hover:shadow-cyan-500/20 transition-all duration-300">
                <div class="h-64 bg-slate-800 relative overflow-hidden">
                    @if($center->image)
                        <img src="{{ $center->image }}" alt="{{ $center->name }}" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-700">
                    @else
                        <div class="w-full h-full bg-gradient-to-br from-slate-700 to-slate-900 flex items-center justify-center text-slate-500">
                            <svg class="w-16 h-16" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path></svg>
                        </div>
                    @endif
                    <div class="absolute bottom-4 left-4 bg-black/60 backdrop-blur-md px-4 py-2 rounded-lg border border-white/10">
                        <span class="text-sm font-semibold tracking-wide text-cyan-400">{{ $center->location }}</span>
                    </div>
                </div>
                
                <div class="p-8">
                    <h2 class="text-2xl font-bold mb-3">{{ $center->name }}</h2>
                    <p class="text-slate-400 text-sm mb-6 flex items-start">
                        <svg class="w-5 h-5 mr-2 text-slate-500 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.243-4.243a8 8 0 1111.314 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path></svg>
                        {{ $center->address }}
                    </p>
                    
                    @if(is_array($center->features))
                        <div class="flex flex-wrap gap-2 mb-8">
                            @foreach($center->features as $feature)
                                <span class="text-xs bg-slate-800 text-slate-300 px-3 py-1 rounded-full border border-slate-700">{{ $feature }}</span>
                            @endforeach
                        </div>
                    @endif
                    
                    <button class="w-full py-3 rounded-xl font-bold text-white bg-slate-800 hover:bg-slate-700 hover:text-cyan-400 transition-colors border border-slate-700 group-hover:border-cyan-500/50">Explore Center</button>
                </div>
            </div>
        @empty
            <!-- Fallback Mock Data -->
            <div class="glass rounded-3xl overflow-hidden group hover:shadow-2xl hover:shadow-cyan-500/20 transition-all duration-300">
                <div class="h-64 bg-slate-800 relative overflow-hidden">
                    <div class="w-full h-full bg-gradient-to-br from-slate-700 to-slate-900 flex items-center justify-center text-slate-500">
                        <svg class="w-16 h-16" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path></svg>
                    </div>
                    <div class="absolute bottom-4 left-4 bg-black/60 backdrop-blur-md px-4 py-2 rounded-lg border border-white/10">
                        <span class="text-sm font-semibold tracking-wide text-cyan-400">Downtown</span>
                    </div>
                </div>
                <div class="p-8">
                    <h2 class="text-2xl font-bold mb-3">FitSphere Flagship</h2>
                    <p class="text-slate-400 text-sm mb-6">123 Fitness Ave, Metro City</p>
                    <div class="flex flex-wrap gap-2 mb-8">
                        <span class="text-xs bg-slate-800 text-slate-300 px-3 py-1 rounded-full border border-slate-700">Cardio Zone</span>
                        <span class="text-xs bg-slate-800 text-slate-300 px-3 py-1 rounded-full border border-slate-700">CrossFit</span>
                        <span class="text-xs bg-slate-800 text-slate-300 px-3 py-1 rounded-full border border-slate-700">Spa</span>
                    </div>
                    <button class="w-full py-3 rounded-xl font-bold text-white bg-slate-800 hover:bg-slate-700 hover:text-cyan-400 transition-colors border border-slate-700">Explore Center</button>
                </div>
            </div>
            
            <div class="glass rounded-3xl overflow-hidden group hover:shadow-2xl hover:shadow-cyan-500/20 transition-all duration-300">
                <div class="h-64 bg-slate-800 relative overflow-hidden">
                    <div class="w-full h-full bg-gradient-to-br from-slate-700 to-slate-900 flex items-center justify-center text-slate-500">
                        <svg class="w-16 h-16" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path></svg>
                    </div>
                    <div class="absolute bottom-4 left-4 bg-black/60 backdrop-blur-md px-4 py-2 rounded-lg border border-white/10">
                        <span class="text-sm font-semibold tracking-wide text-cyan-400">Westside</span>
                    </div>
                </div>
                <div class="p-8">
                    <h2 class="text-2xl font-bold mb-3">FitSphere Studio</h2>
                    <p class="text-slate-400 text-sm mb-6">456 Wellness Blvd, Metro City</p>
                    <div class="flex flex-wrap gap-2 mb-8">
                        <span class="text-xs bg-slate-800 text-slate-300 px-3 py-1 rounded-full border border-slate-700">Yoga Studio</span>
                        <span class="text-xs bg-slate-800 text-slate-300 px-3 py-1 rounded-full border border-slate-700">Pilates</span>
                    </div>
                    <button class="w-full py-3 rounded-xl font-bold text-white bg-slate-800 hover:bg-slate-700 hover:text-cyan-400 transition-colors border border-slate-700">Explore Center</button>
                </div>
            </div>
        @endforelse
    </div>
</body>
</html>
