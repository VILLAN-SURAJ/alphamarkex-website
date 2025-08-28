from PIL import Image
import os
from pathlib import Path

def to_webp(png_path: Path) -> Path:
    img = Image.open(png_path)
    if img.mode != 'RGB':
        img = img.convert('RGB')
    w, h = img.size
    if w > 1600:
        ratio = 1600 / w
        img = img.resize((1600, int(h * ratio)))
    out = png_path.with_suffix('.webp')
    img.save(out, 'WEBP', quality=80, method=6)
    print(f"Saved {out} ({out.stat().st_size/1024/1024:.2f} MB)")
    return out

if __name__ == '__main__':
    for name in ['shoot1-v1.png', 'shoot2-v1.png', 'shoot3-v1.png']:
        p = Path(name)
        if p.exists():
            to_webp(p)
        else:
            print(f"Missing {name}")
