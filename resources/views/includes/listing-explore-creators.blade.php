@foreach ($users as $user)

<a href="{{url($user->username)}}">
<div class="w-100 h-100 d-block user-cover" style="background: url('@if ($user->cover != '') {{ Helper::getFile(config('path.cover').$user->cover) }}  @endif') #505050 center center; border-radius: 6px; background-size: cover;">

  <div class="card-cover position-relative" style="height: 50px">
    @if ($user->free_subscription == 'yes')
    <span class="badge-free px-2 py-1 text-uppercase position-absolute rounded">{{ __('general.free') }}</span>
  @endif
  </div>

  <li class="list-group-item mb-2 border-0" style="background: rgba(0,0,0,.35);">
         <div class="media">
          <div class="media-left mr-3">
              <img class="media-object rounded-circle avatar-user-home" src="{{Helper::getFile(config('path.avatar').$user->avatar)}}"  width="95" height="95">
          </div>
          <div class="media-body">
            <h6 class="media-heading mb-1">
              <a href="{{url($user->username)}}" class="stretched-link text-white">
                <strong>{{$user->hide_name == 'yes' ? $user->username : $user->name}}</strong>
              </a>
               @if($user->verified_id == 'yes')
                 <small class="verified mr-1 text-white" title="{{trans('general.verified_account')}}"data-toggle="tooltip" data-placement="top">
                   <i class="bi bi-patch-check"></i>
                 </small>
               @endif

               @if ($user->featured == 'yes')
              <small class="text-featured" title="{{trans('users.creator_featured')}}" data-toggle="tooltip" data-placement="top">
                <i class="fas fa fa-award"></i>
              </small>
              @endif

               <small class=" text-white w-100 d-block">{{'@'.$user->username}}</small>
            </h6>

            <ul class="list-inline text-white">
              <li class="list-inline-item small"><i class="feather icon-file-text"></i> {{ Helper::formatNumber($user->updates()->count()) }}</li>
              <li class="list-inline-item small"><i class="feather icon-image"></i> {{ Helper::formatNumber($user->media()->where('media.image', '<>', '')->count()) }}</li>
              <li class="list-inline-item small"><i class="feather icon-video"></i> {{ Helper::formatNumber($user->media()->where('media.video', '<>', '')->orWhere('media.video_embed', '<>', '')->where('media.user_id', $user->id)->count()) }}</li>
              <li class="list-inline-item small"><i class="feather icon-mic"></i> {{ Helper::formatNumber($user->media()->where('media.music', '<>', '')->count()) }}</li>
              @if ($user->media()->where('media.file', '<>', '')->count() != 0)
              <li class="list-inline-item small"><i class="far fa-file-archive"></i> {{ Helper::formatNumber($user->media()->where('media.file', '<>', '')->count()) }}</li>
              @endif
            </ul>
          </div>
      </div>
  </li>
	</div><!-- cover -->
  </a>
  @endforeach
