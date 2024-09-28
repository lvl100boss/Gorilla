<div>
    <div class="bg-medium-dark h-full min-h-screen w-64 p-8">
        <div class="fixed w-48">
            <div class="p-4 border-y-[1px] border-zinc-700 rounded-sm">
                <a href="{{ route('admin_dashboard') }}" class="{{ request()->routeIs('admin_dashboard') ? 'text-accent font-semibold' : 'text-white' }}">
                    <i class="fi-rr-dashboard -mb-2"></i><span class="ml-2">DASHBOARD</span>
                </a>
            </div>
            <div class="p-4 border-b-[1px] border-zinc-700 rounded-sm">
                <a href="{{ route('admin_products') }}" class="{{ request()->routeIs('admin_products') ? 'text-accent font-semibold' : 'text-white' }}"> 
                    <i class="fi fi-rs-boxes -mb-2"></i> <span class="ml-2">PRODUCTS</span>
                </a>
            </div>
            <div class="p-4 border-b-[1px] border-zinc-700 rounded-sm">
                <a href="{{ route('admin_orders') }}" class="{{ request()->routeIs('admin_orders') ? 'text-accent font-semibold' : 'text-white' }}">    
                    <i class="fi fi-rs-dolly-flatbed-alt -mb-2"></i> <span class="ml-2">ORDERS</span>
                </a>
            </div>
            <div class="p-4 border-b-[1px] border-zinc-700 rounded-sm">
                <a href="{{ route('admin_users') }}" class="{{ request()->routeIs('admin_users') ? 'text-accent font-semibold' : 'text-white' }}"> 
                    <i class="fi fi-rs-users-alt -mb-2"></i> <span class="ml-2">USERS</span>
                </a>
            </div>
            <div class="p-4 border-b-[1px] border-zinc-700 rounded-sm">
                <a href="{{ route('admin_history') }}" class="{{ request()->routeIs('admin_history') ? 'text-accent font-semibold' : 'text-white' }}">  <i class="fi fi-rs-time-past -mb-2"></i> <span class="ml-2">HISTORY</span>
                </a>
            </div>
        </div>
    </div>
</div>