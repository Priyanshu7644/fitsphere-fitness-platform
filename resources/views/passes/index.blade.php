<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FitSphere Passes | Elite Fitness</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600;800&display=swap');
        body { font-family: 'Inter', sans-serif; background-color: #0f172a; color: #f8fafc; }
        .glass { background: rgba(30, 41, 59, 0.7); backdrop-filter: blur(10px); border: 1px solid rgba(255,255,255,0.1); }
        .gradient-text { background: linear-gradient(90deg, #f43f5e, #fb923c); -webkit-background-clip: text; -webkit-text-fill-color: transparent; }
    </style>
</head>
<body class="antialiased min-h-screen flex flex-col items-center py-20 px-6">
    <header class="text-center mb-16 max-w-2xl">
        <h1 class="text-5xl font-extrabold mb-6">Choose Your <span class="gradient-text">FitSphere Pass</span></h1>
        <p class="text-lg text-slate-400">Unlock unlimited access to elite fitness centers, live workouts, and pro trainers. Inspired by the best in the industry.</p>
    </header>

    <div class="grid grid-cols-1 md:grid-cols-3 gap-8 max-w-6xl w-full">
        @forelse($passes as $pass)
            <div class="glass p-8 rounded-3xl hover:scale-105 transition-transform duration-300 relative overflow-hidden flex flex-col">
                @if($pass->type == 'elite')
                    <div class="absolute top-0 right-0 bg-gradient-to-r from-rose-500 to-orange-400 text-xs font-bold px-4 py-1 rounded-bl-xl uppercase tracking-wider">Most Popular</div>
                @endif
                <h2 class="text-3xl font-bold mb-2 capitalize">{{ $pass->title }}</h2>
                <div class="text-slate-400 mb-6 flex-grow">{{ $pass->description }}</div>
                
                <div class="text-4xl font-extrabold mb-6">
                    ₹{{ number_format($pass->price, 0) }}
                    <span class="text-lg font-normal text-slate-500">/ {{ $pass->duration_days }} days</span>
                </div>
                
                <ul class="space-y-4 mb-8 flex-grow">
                    @if(is_array($pass->features))
                        @foreach($pass->features as $feature)
                            <li class="flex items-center text-sm text-slate-300">
                                <svg class="w-5 h-5 mr-3 text-rose-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
                                {{ $feature }}
                            </li>
                        @endforeach
                    @else
                        <li class="flex items-center text-sm text-slate-300">
                            <svg class="w-5 h-5 mr-3 text-rose-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
                            Access to standard features
                        </li>
                    @endif
                </ul>
                
                <a href="{{ route('public.passes.show', $pass->id) }}" class="block text-center w-full py-4 rounded-xl font-bold text-white {{ $pass->type == 'elite' ? 'bg-gradient-to-r from-rose-600 to-orange-500 hover:from-rose-500 hover:to-orange-400 transition-all shadow-lg shadow-rose-500/30' : 'bg-slate-800 hover:bg-slate-700 transition-all' }}">Get {{ ucfirst($pass->type) }} Pass</a>
            </div>
        @empty
            <!-- Fallback Mock Data -->
            <div class="glass p-8 rounded-3xl hover:scale-105 transition-transform duration-300 flex flex-col">
                <h2 class="text-3xl font-bold mb-2">Pro Pass</h2>
                <div class="text-slate-400 mb-6 flex-grow">Access all standard gyms and group classes.</div>
                <div class="text-4xl font-extrabold mb-6">$49.99<span class="text-lg font-normal text-slate-500">/ 30 days</span></div>
                <button class="w-full py-4 rounded-xl font-bold text-white bg-slate-800 hover:bg-slate-700 transition-all">Get Pro Pass</button>
            </div>
            
            <div class="glass p-8 rounded-3xl border-rose-500/50 hover:scale-105 transition-transform duration-300 flex flex-col relative">
                <div class="absolute top-0 right-0 bg-gradient-to-r from-rose-500 to-orange-400 text-xs font-bold px-4 py-1 rounded-bl-xl uppercase tracking-wider">Recommended</div>
                <h2 class="text-3xl font-bold mb-2">Elite Pass</h2>
                <div class="text-slate-400 mb-6 flex-grow">Unlimited access to premium centers, spa, and VIP trainers.</div>
                <div class="text-4xl font-extrabold mb-6">$99.99<span class="text-lg font-normal text-slate-500">/ 30 days</span></div>
                <button class="w-full py-4 rounded-xl font-bold text-white bg-gradient-to-r from-rose-600 to-orange-500 hover:from-rose-500 hover:to-orange-400 transition-all shadow-lg shadow-rose-500/30">Get Elite Pass</button>
            </div>
            
            <div class="glass p-8 rounded-3xl hover:scale-105 transition-transform duration-300 flex flex-col">
                <h2 class="text-3xl font-bold mb-2">Home Pass</h2>
                <div class="text-slate-400 mb-6 flex-grow">Access to live virtual workouts and digital plans.</div>
                <div class="text-4xl font-extrabold mb-6">$19.99<span class="text-lg font-normal text-slate-500">/ 30 days</span></div>
                <button class="w-full py-4 rounded-xl font-bold text-white bg-slate-800 hover:bg-slate-700 transition-all">Get Home Pass</button>
            </div>
        @endforelse
    </div>
</body>
</html>
