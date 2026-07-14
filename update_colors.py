import os
import glob

# Mapping old hex colors to new hex colors
css_vars = {
    "--green-950: #052e16;": "--green-950: #1a1e06;",
    "--green-900: #14532d;": "--green-900: #2b310a;",
    "--green-800: #166534;": "--green-800: #3f4710;",
    "--green-700: #15803d;": "--green-700: #556017;",
    "--green-600: #16a34a;": "--green-600: #6c7b1c;",
    "--green-500: #22c55e;": "--green-500: #869722;",
    "--green-400: #4ade80;": "--green-400: #a2b435;",
    "--green-300: #86efac;": "--green-300: #bdcc5f;",
    "--green-200: #bbf7d0;": "--green-200: #d5e092;",
    "--green-100: #dcfce7;": "--green-100: #ecf3cc;",
    "--green-50: #f0fdf4;": "--green-50: #f7faeb;",
}

# Mapping old RGBA values to new RGBA values
rgba_vars = {
    "rgba(34, 197, 94,": "rgba(134, 151, 34,",   # green-500 #22c55e -> #869722
    "rgba(34,197,94,": "rgba(134,151,34,",
    "rgba(22, 163, 74,": "rgba(108, 123, 28,",   # green-600 #16a34a -> #6c7b1c
    "rgba(22,163,74,": "rgba(108,123,28,",
    "rgba(5, 46, 22,": "rgba(26, 30, 6,",        # green-950 #052e16 -> #1a1e06
    "rgba(5,46,22,": "rgba(26,30,6,",
    "rgba(21, 128, 61,": "rgba(85, 96, 23,",     # green-700 #15803d -> #556017
    "rgba(21,128,61,": "rgba(85,96,23,",
    "rgba(20, 83, 45,": "rgba(63, 71, 16,",      # green-800 #166534 -> #3f4710
    "rgba(20,83,45,": "rgba(63,71,16,",
    "#4ade80": "#a2b435",                        # inline hardcoded colors
}

# Directories to search
blade_files = glob.glob('resources/views/**/*.blade.php', recursive=True)

for file in blade_files:
    with open(file, 'r', encoding='utf-8') as f:
        content = f.read()
    
    original_content = content
    
    for old, new in css_vars.items():
        content = content.replace(old, new)
        
    for old, new in rgba_vars.items():
        content = content.replace(old, new)
        
    if content != original_content:
        with open(file, 'w', encoding='utf-8') as f:
            f.write(content)
        print(f"Updated {file}")

print("Color update complete!")
