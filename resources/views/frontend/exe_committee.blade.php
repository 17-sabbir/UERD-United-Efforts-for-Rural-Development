@extends('main')

@section('content')

<style>
/* ═══════════════════════════════════════════════
   ORG-CHART TREE — UERD Management Structure
═══════════════════════════════════════════════ */

.org-section {
    padding: 40px 0 80px;
    background: #fff;
}

/* ── Tree Container ─────────────────────────── */
.org-tree-wrap {
    overflow-x: auto;
    padding: 30px 10px 60px;
    min-width: 100%;
}

.org-tree,
.org-tree ul {
    list-style: none;
    padding: 0;
    margin: 0;
    display: flex;
    flex-direction: column;
    align-items: center;
    position: relative;
}

/* ── Connector lines (standard organizational chart) ── */

/* Each li is a flex column, centered */
.org-tree li {
    position: relative;
    display: flex;
    flex-direction: column;
    align-items: center;
    padding: 0 10px;
    flex-shrink: 0;
    /* Ensure the LI takes full width of its content so spacing is correct */
    width: max-content; 
}

/* Children row container */
.org-tree li > ul {
    display: flex;
    flex-direction: row;
    justify-content: center;
    align-items: flex-start; /* Align all children to top so horizontal bar is straight */
    flex-wrap: nowrap;       /* FORCE single row, never wrap */
    padding-top: 20px;
    position: relative;
    /* Ensure the UL takes full width necessary for children */
    width: max-content;
    margin: 0 auto;         /* Center the UL relative to parent LI */
}

/* Vertical STEM from parent node down to the horizontal bar */
.org-tree li > ul::before {
    content: '';
    position: absolute;
    top: 0;
    left: 50%;
    width: 0;
    height: 20px;
    border-left: 2px solid #000;
    z-index: 10; /* Bring TO FRONT just in case */
}

/* Each child li reserves 20px above for bar + vertical drop */
.org-tree li > ul > li {
    padding-top: 20px;
}

/*
 * TWO-HALF horizontal bar approach
 */
.org-tree li > ul > li::before,
.org-tree li > ul > li::after {
    content: '';
    position: absolute;
    top: 0;
    height: 20px;
    box-sizing: border-box;
    width: 50%;
    border-top: 2px solid #000;
    z-index: 10; /* Bring TO FRONT */
}

/* LEFT half: border-top only */
.org-tree li > ul > li::before {
    left: 0;
    width: calc(50% + 1px);
}

/* RIGHT half: border-top + vertical drop */
.org-tree li > ul > li::after {
    right: 0;
    width: 50%;
    border-left: 2px solid #000;
}

/* Special Case: SINGLE CHILD (Stack) */
/* When there is only one child, we DON'T want a horizontal line (border-top). */
/* We ONLY want the vertical drop (border-left). */
.org-tree li > ul > li:only-child::after {
    border-top: none; 
    border-left: 2px solid #000;
}
.org-tree li > ul > li:only-child::before {
    display: none;
}

/* First child: remove left-half bar */
.org-tree li > ul > li:first-child::before { display: none; }

/* Last child: remove right-half bar but keep vertical drop */
.org-tree li > ul > li:last-child::after   { border-top: none; }
/* Re-apply vertical drop for last child because 'border-top: none' doesn't affect border-left, */
/* but let's be safe and explicit about the border-left being there. */
.org-tree li > ul > li:last-child::after { border-left: 2px solid #000; }


/* Root: no lines above it */
.org-tree > li > ul::before { /* Root's children DO need a stem FROM root */ }
.org-tree > li { padding-top: 0; }
.org-tree > li::before { display: none !important; }
.org-tree > li::after  { display: none !important; }

/* Only child: just vertical drop, no horizontal bar at all */
.org-tree li > ul > li:only-child::after   { border-top: none; }
.org-tree li > ul > li:only-child::before  { display: none; }

/* Root: no lines above it */
.org-tree > li { padding-top: 0; }
.org-tree > li::before { display: none !important; }
.org-tree > li::after  { display: none !important; }



/* First child: remove left-half bar (nothing to the left) */
.org-tree li > ul > li:first-child::before { border-top: none; }

/* Last child: remove right-half bar (nothing to the right) */
.org-tree li > ul > li:last-child::after   { border-top: none; }

/* Only child: just vertical drop, no horizontal bar */
.org-tree li > ul > li:only-child::before  { display: none; }
.org-tree li > ul > li:only-child::after   { border-top: none; }

/* Root: no lines above it */
.org-tree > li { padding-top: 0; }
.org-tree > li::before { display: none !important; }
.org-tree > li::after  { display: none !important; }

/* ── Arrowhead on every node except root ────── */
.org-node::before {
    content: '';
    display: block;
    width: 0;
    height: 0;
    border-left: 5px solid transparent;
    border-right: 5px solid transparent;
    border-top: 7px solid #000;
    margin: -1px auto 0;
}
/* root node — hide arrowhead */
.org-tree > li > .org-node::before { display: none; }

/* ── Node Card — Reference box style ───────── */
.org-node { text-align: center; }

.node-card {
    display: inline-flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
    background: #FAD7A8;        /* peach/orange — default */
    border: 1.5px solid #b5763a;
    border-radius: 4px;
    padding: 9px 20px;
    min-width: 150px;
    max-width: 220px;
    white-space: nowrap;
    box-shadow: 2px 2px 6px rgba(0,0,0,.15);
    transition: filter .2s, box-shadow .2s;
    position: relative;
    user-select: none;
    cursor: pointer;
}
.node-card:hover {
    filter: brightness(1.06);
    box-shadow: 3px 4px 12px rgba(0,0,0,.22);
}

/* top-tier nodes (passed via CSS class node-top) */
.node-top .node-card {
    background: #5BC8D4;
    border: 1.5px solid #2a8f9c;
    color: #000;
}
.node-top .node-card .node-designation { color: #012e34; }
.node-top .node-card .node-name        { color: #000; }

/* text inside box */
.node-name {
    font-size: .78rem;
    font-weight: 700;
    color: #3a1a00;
    margin: 0 0 1px;
    line-height: 1.3;
    white-space: normal;
    text-align: center;
}
.node-designation {
    font-size: .72rem;
    color: #5a2800;
    font-weight: 600;
    text-transform: uppercase;
    letter-spacing: .03em;
    display: block;
    white-space: normal;
    text-align: center;
}

/* ── Empty state ────────────────────────────── */
.org-empty { text-align:center; padding:80px 20px; color:#aaa; }
.org-empty i { font-size:4rem; display:block; margin-bottom:16px; }

/* no bio/socials visible on card */
.node-bio, .node-socials, .node-photo { display: none !important; }

/* ── Member Modal ───────────────────────────── */
#memberModal .modal-header { background: linear-gradient(135deg,#2E8B66,#1f6b4e); color:#fff; border:none; }
#memberModal .modal-header .btn-close { filter: invert(1); }
#memberModal .modal-photo {
    width: 100px; height: 100px;
    border-radius: 50%;
    object-fit: cover;
    border: 4px solid #e8f5f0;
    box-shadow: 0 4px 16px rgba(46,139,102,.2);
}
#memberModal .modal-photo-placeholder {
    width:100px; height:100px;
    border-radius:50%;
    background:#f0fdf7;
    display:flex; align-items:center; justify-content:center;
    font-size:2.5rem; color:#aaa;
    border: 4px solid #e8f5f0;
}
#memberModal .social-link {
    display: inline-flex;
    align-items: center;
    gap: 6px;
    padding: 6px 14px;
    border-radius: 999px;
    background: #f0fdf7;
    color: #2E8B66;
    font-size: .82rem;
    text-decoration: none;
    transition: background .2s;
}
#memberModal .social-link:hover { background: #2E8B66; color:#fff; }

/* ── Management Content Section ─────────────── */
.management-content-body p { margin-bottom: 1.1rem; }
.management-content-body strong { color: #102A43; font-weight: 700; }
.management-content-body h4,
.management-content-body h5 { color: #102A43; font-weight: 700; margin-top: 1.4rem; margin-bottom: .4rem; }

/* ── Responsive ─────────────────────────────── */
@media (max-width: 768px) {
    .node-card { width: 120px; padding: 12px 8px 10px; }
    .node-photo { width:50px; height:50px; }
    .org-tree > li > .org-node > .node-card { width:140px; }
    .org-tree > li > .org-node > .node-card .node-photo { width:62px; height:62px; }
    .org-tree li { padding: 0 6px; }
}
</style>

<!-- ─── Breadcrumb ─── -->
<section class="modern-breadcrumbs">
    <div class="container text-center">
        <h2>Management Structure</h2>
        <ol class="d-inline-flex justify-content-center">
            <li><a href="{{ url('/') }}">Home</a></li>
            <li class="current">Executive Committee</li>
        </ol>
        @php
            $pdfPath = !empty($orgProfile->organogram_pdf)
                ? asset('storage/' . $orgProfile->organogram_pdf)
                : asset('frontend/file/UERD_Organogram.pdf');
        @endphp
        <div class="mt-3">
            <a href="{{ $pdfPath }}" target="_blank" class="btn btn-success btn-sm rounded-pill px-4">
                <i class="fa-solid fa-file-pdf me-2"></i> View Organogram (PDF)
            </a>
        </div>
    </div>
</section>

@if(!empty($orgProfile->management_content))
<!-- ─── Management Structure Content ─── -->
<section style="padding: 50px 0; background:#fff; border-bottom: 1px solid #e8f5f0;">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-10">
                <div class="management-content-body" style="font-size:.97rem; line-height:2; color:#333; text-align:justify;">
                    {!! $orgProfile->management_content !!}
                </div>
            </div>
        </div>
    </div>
</section>
@endif

<!-- ─── Org Chart Tree ─── -->
<section class="org-section">
    <div class="container-fluid px-3 px-md-5">

        @if(isset($tree) && count($tree) > 0)

            <div class="org-tree-wrap" data-aos="fade-up">
                <ul class="org-tree">
                    @include('frontend._org_tree_node', ['nodes' => $tree, 'depth' => 0])
                </ul>
            </div>

        @else
            <div class="org-empty">
                <i class="fa-solid fa-diagram-project"></i>
                <p>Management structure is being updated. Please check back soon.</p>
            </div>
        @endif

    </div>
</section>

<!-- ─── Member Detail Modal ─── -->
<div class="modal fade" id="memberModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-md">
        <div class="modal-content border-0 shadow">
            <div class="modal-header">
                <h5 class="modal-title fw-bold" id="modalMemberName">—</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body p-4">
                <div class="d-flex align-items-start gap-4 mb-4">
                    <div id="modalPhotoWrap"></div>
                    <div>
                        <h5 class="fw-bold mb-1" id="modalName" style="color:#102A43;"></h5>
                        <span class="badge rounded-pill" id="modalDesignation"
                              style="background:#e8f5f0;color:#2E8B66;font-size:.8rem;font-weight:600;"></span>
                    </div>
                </div>
                <div id="modalBioWrap" class="mb-4" style="display:none;">
                    <h6 class="fw-semibold mb-2" style="color:#2E8B66;">About</h6>
                    <p id="modalBio" style="color:#627D98;line-height:1.8;font-size:.95rem;white-space:pre-line;"></p>
                </div>
                <div id="modalSocialsWrap" class="d-flex flex-wrap gap-2" style="display:none !important;"></div>
            </div>
        </div>
    </div>
</div>

<script>
function openMemberModal(card) {
    var name        = card.dataset.name        || '';
    var designation = card.dataset.designation || '';
    var bio         = card.dataset.bio         || '';
    var photo       = card.dataset.photo       || '';
    var facebook    = card.dataset.facebook    || '';
    var twitter     = card.dataset.twitter     || '';
    var youtube     = card.dataset.youtube     || '';
    var instagram   = card.dataset.instagram   || '';

    document.getElementById('modalMemberName').textContent = name;
    document.getElementById('modalName').textContent       = name;
    document.getElementById('modalDesignation').textContent = designation;

    // Photo
    var photoWrap = document.getElementById('modalPhotoWrap');
    if (photo) {
        photoWrap.innerHTML = '<img src="' + photo + '" alt="' + name + '" class="modal-photo">';
    } else {
        photoWrap.innerHTML = '<div class="modal-photo-placeholder"><i class="fa-solid fa-user"></i></div>';
    }

    // Bio
    var bioWrap = document.getElementById('modalBioWrap');
    var bioEl   = document.getElementById('modalBio');
    if (bio.trim()) {
        bioEl.textContent = bio;
        bioWrap.style.display = 'block';
    } else {
        bioWrap.style.display = 'none';
    }

    // Socials
    var socialsWrap = document.getElementById('modalSocialsWrap');
    socialsWrap.innerHTML = '';
    var links = [
        { url: facebook,  icon: 'fa-facebook-f',  label: 'Facebook'  },
        { url: twitter,   icon: 'fa-x-twitter',   label: 'Twitter/X' },
        { url: instagram, icon: 'fa-instagram',   label: 'Instagram' },
        { url: youtube,   icon: 'fa-youtube',     label: 'YouTube'   },
    ];
    var hasSocial = false;
    links.forEach(function(s) {
        if (s.url.trim()) {
            hasSocial = true;
            socialsWrap.innerHTML += '<a href="' + s.url + '" target="_blank" class="social-link"><i class="fa-brands ' + s.icon + '"></i> ' + s.label + '</a>';
        }
    });
    socialsWrap.style.display = hasSocial ? 'flex' : 'none';

    var modal = new bootstrap.Modal(document.getElementById('memberModal'));
    modal.show();
}
</script>

@endsection
