 <!-- SEO Card -->
 {{-- @dd($seoData) --}}
 <div class="card " id="seo-card">

     <div class="card-body">
         <div class="d-flex justify-content-between align-items-center mb-2">
             <h4 class="card-title">Cần tối ưu</h4>
             {{-- <a href="#" id="edit-seo-btn">Edit SEO meta</a> --}}
         </div>
         <div id="seo-form">
             <hr>
             <!-- Phần hiển thị điểm SEO -->
             <div class="mb-3">

                 <ul class="list-unstyled mb-0 mt-2" id="seoAnalysis">
                     @if (isset($seoData['analysis']) && count($seoData['analysis']))
                         @foreach ($seoData['analysis'] as $item)
                             <li class="d-flex align-items-center mb-2">
                                 @php
                                     switch ($item['status']) {
                                         case 'success':
                                             $icon = 'fa-check-circle';
                                             $colorClass = 'text-success'; // xanh lá
                                             break;
                                         case 'warning':
                                             $icon = 'fa-exclamation-circle';
                                             $colorClass = 'text-warning'; // vàng
                                             break;
                                         case 'danger':
                                             $icon = 'fa-times-circle';
                                             $colorClass = 'text-danger'; // đỏ
                                             break;
                                         default:
                                             $icon = 'fa-info-circle';
                                             $colorClass = 'text-muted'; // xám
                                     }
                                 @endphp
                                 <i class="fa {{ $icon }} {{ $colorClass }} me-2 fs-5"></i>
                                 <span class="text-dark">{{ $item['message'] }}</span>
                             </li>
                         @endforeach
                     @endif
                 </ul>
             </div>
         </div>
     </div>
 </div>

 {{-- Hiển thị lỗi --}}
 <div class="card" id="seo-card-error">
     <div class="card-body">
         <div class="d-flex justify-content-between align-items-center mb-2">
             <h4 class="card-title">Cẩn cải thiện</h4>

             {{-- <a href="#" id="edit-seo-btn-error">Edit SEO meta</a> --}}
         </div>
         <div id="seo-desc-error"></div>
         <div id="seo-form-error">
             <hr>
             <!-- Phần hiển thị lỗi SEO -->
             <div class="mb-3">
                 <ul class="list-unstyled mb-0 mt-2" id="seoSuggestions">
                     @if (isset($seoData['suggestions']) && count($seoData['suggestions']))
                         @foreach ($seoData['suggestions'] as $item)
                             <li class="d-flex align-items-center mb-2">
                                 @php
                                     switch ($item['status']) {
                                         case 'success':
                                             $icon = 'fa-check-circle';
                                             $colorClass = 'text-success'; // xanh lá
                                             break;
                                         case 'warning':
                                             $icon = 'fa-exclamation-circle';
                                             $colorClass = 'text-warning'; // vàng
                                             break;
                                         case 'danger':
                                             $icon = 'fa-times-circle';
                                             $colorClass = 'text-danger'; // đỏ
                                             break;
                                         default:
                                             $icon = 'fa-info-circle';
                                             $colorClass = 'text-muted'; // xám
                                     }
                                 @endphp
                                 <i class="fa {{ $icon }} {{ $colorClass }} me-2 fs-5"></i>
                                 <span class="text-dark">{{ $item['message'] }}</span>
                             </li>
                         @endforeach
                     @endif
                 </ul>
             </div>
         </div>
     </div>
 </div>
