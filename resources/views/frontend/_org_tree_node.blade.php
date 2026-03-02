{{-- Recursive org-chart node --}}
@php $currentDepth = $depth ?? 0; @endphp
@foreach($nodes as $node)
<li>
    {{-- depth 0 & 1 get teal/cyan boxes; deeper get orange/peach --}}
    <div class="org-node {{ $currentDepth <= 1 ? 'node-top' : '' }}">
        <div class="node-card"
             data-name="{{ e($node->name) }}"
             data-designation="{{ e($node->designation) }}"
             data-bio="{{ e($node->bio ?? '') }}"
             data-photo="{{ $node->photo ? asset('images/executive_committee/'.$node->photo) : '' }}"
             data-facebook="{{ e($node->facebook ?? '') }}"
             data-twitter="{{ e($node->twitter ?? '') }}"
             data-youtube="{{ e($node->youtube ?? '') }}"
             data-instagram="{{ e($node->instagram ?? '') }}"
             onclick="openMemberModal(this)"
             title="Click for full details">
            <h6 class="node-name">{{ $node->designation }}</h6>
            @if($node->name)
            <span class="node-designation">{{ $node->name }}</span>
            @endif
        </div>
    </div>
    @if(!empty($node->children))
        <ul>
            @include('frontend._org_tree_node', ['nodes' => $node->children, 'depth' => $currentDepth + 1])
        </ul>
    @endif
</li>
@endforeach
