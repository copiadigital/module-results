<div class="section results">
  @if($results)
    <ul class="results__nav table-tabs nav nav-tabs" id="resultsTabNav" role="tablist">
      @foreach ($results as $key => $item)
        @if($item['years'])
          <li class="results__nav-item table-tabs__nav-item" role="presentation">
            <a class="results__nav-link table-tabs__nav-link {{ ($loop->first) ? 'active' : '' }}" data-bs-toggle="tab" data-bs-target="#results-{{ $key . '-' . $item['years']['slug'] }}-pane" type="button" role="tab" aria-controls="results-{{ $key . '-' . $item['years']['slug'] }}-pane" aria-selected="{{ ($loop->first) ? 'true' : 'false' }}">{{ $item['years']['name'] }}</a>
          </li>
        @endif
      @endforeach
    </ul>
    <div class="results__tab-content table-tabs__tab-content tab-content" id="resultsTabContent">
      @foreach($results as $key => $item)
        <div class="results__tab-pane table-tabs__tab-pane tab-pane fade {{ ($loop->first) ? 'show active' : '' }}" id="results-{{ $key . '-' . $item['years']['slug'] }}-pane" role="tabpanel" aria-labelledby="results-{{ $key . '-' . $item['years']['slug'] }}-tab" tabindex="0">
          {{-- Links --}}
          @if($item['results'])
            <table class="table results__table">
              <thead class="results__table-head">
                <tr>
                  <th class="table__date">Date</th>
                  <th class="table__title" width="50%">Title</th>
                  <th class="table__press-release text-center" width="10%">Press release</th>
                  <th class="table__presentation text-center" width="10%">Presentation</th>
                  <th class="table__report text-center" width="10%">Report</th>
                </tr>
              </thead>
              <tbody class="results__table-body">
                @foreach($item['results'] as $result)
                  <tr class="results__table-row">
                    <td class="results__table-date text-s text-dark-grey">{!! $result['date'] !!}</td>
                    <td class="results__table-title fw-600 text-dark-grey">{!! $result['title'] !!}</td>
                    <td class="results__table-press-release column-2 text-md-center">
                      @if($result['press_release'])
                        <a href="{{ $result['press_release']['url'] }}" target="_blank">
                          <svg width="22" height="26" viewBox="0 0 22 26" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M6.99935 13H14.9993M6.99935 18.3333H14.9993M17.666 25H4.33268C3.62544 25 2.94716 24.719 2.44706 24.219C1.94697 23.7189 1.66602 23.0406 1.66602 22.3333V3.66667C1.66602 2.95942 1.94697 2.28115 2.44706 1.78105C2.94716 1.28095 3.62544 1 4.33268 1H11.7807C12.1343 1.00008 12.4734 1.1406 12.7233 1.39067L19.942 8.60933C20.1921 8.85932 20.3326 9.19841 20.3327 9.552V22.3333C20.3327 23.0406 20.0517 23.7189 19.5516 24.219C19.0515 24.719 18.3733 25 17.666 25Z" stroke="#B7A088" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                          </svg>
                          <span class="d-inline-block d-md-none">Press release</span>
                        </a>
                      @endif
                    </td>
                    <td class="results__table-presentation column-2 text-md-center">
                      @if($result['presentation'])
                        <a href="{{ $result['presentation']['url'] }}" target="_blank">
                          <svg width="26" height="25" viewBox="0 0 26 25" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M7.66667 13.334V12.0007M13 13.334V9.33398M18.3333 13.334V6.66732M7.66667 24.0006L13 18.6673L18.3333 24.0006M1 1.33398H25M2.33333 1.33398H23.6667V17.334C23.6667 17.6876 23.5262 18.0267 23.2761 18.2768C23.0261 18.5268 22.687 18.6673 22.3333 18.6673H3.66667C3.31304 18.6673 2.97391 18.5268 2.72386 18.2768C2.47381 18.0267 2.33333 17.6876 2.33333 17.334V1.33398Z" stroke="#B7A088" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                          </svg>
                          <span class="d-inline-block d-md-none">Presentation</span>
                        </a>
                      @endif
                    </td>
                    <td class="results__table-report column-2 text-md-center">
                      @if($result['report'])
                        <a href="{{ $result['report']['url'] }}" target="_blank">
                          <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M1.33398 17.334V18.6673C1.33398 19.7282 1.75541 20.7456 2.50556 21.4957C3.2557 22.2459 4.27312 22.6673 5.33398 22.6673H18.6673C19.7282 22.6673 20.7456 22.2459 21.4957 21.4957C22.2459 20.7456 22.6673 19.7282 22.6673 18.6673V17.334M17.334 12.0007L12.0007 17.334M12.0007 17.334L6.66732 12.0007M12.0007 17.334V1.33398" stroke="#B7A088" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                          </svg>
                          <span class="d-inline-block d-md-none">Download</span>
                        </a>
                      @endif
                    </td>
                  </tr>
                @endforeach
              </tbody>
            </table>
          @endif
        </div>
      @endforeach
    </div>
  @endif
</div>
