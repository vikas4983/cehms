  <div class="p-0 result table-responsive">
      <table class="table  bordered-table mb-0">
          <thead>
              <tr>
                  <th>
                      <div class="form-check d-flex align-items-center">
                          <input class="form-check-input enquiryCheckbox" type="checkbox" id="selectAll">
                          <label class="form-check-label ms-2">S.L</label>
                      </div>
                  </th>
                  <th>Date</th>
                  <th>Name</th>
                  <th>Mobile</th>
                  <th>Email</th>
                  <th>Action</th>
              </tr>
          </thead>

          <tbody>
              @forelse ($data as $index => $enquiry)
                  <tr>
                      <td>
                          <div class="form-check d-flex align-items-center">
                              <input class="form-check-input enquiryCheckbox" type="checkbox">
                              <label class="ms-2">{{ $index + 1 }}</label>
                          </div>
                      </td>
                      <td>
                          @if (!empty($enquiry->insertOn))
                              {{ $enquiry->insertOn->format('d M Y') }}
                          @else
                              {{ $enquiry->created_at->format('d M Y') }}
                          @endif
                      </td>
                      <td>{{ $enquiry->name }}</td>
                      <td>{{ $enquiry->mobile }}</td>
                      <td>{{ $enquiry->email }}</td>
                      <td>
                          <div class="btn-group">
                              <button type="button" class="text-primary-light text-xl" data-bs-toggle="dropdown"
                                  data-bs-display="static" aria-expanded="false">
                                  <iconify-icon icon="tabler:dots-vertical"></iconify-icon>
                              </button>
                              <ul class="dropdown-menu dropdown-menu-lg-end border p-12">
                                  <li>
                                      <x-button.edit-button-component :route="route('enquiries.edit', $enquiry->id)" />

                                  </li>
                                  <li>
                                      <x-button.delete-button-component :route="route('enquiries.destroy', $enquiry->id)" :id="$enquiry->id" />
                                  </li>

                              </ul>
                          </div>
  </div>
  </td>
  </tr>

@empty
  <tr>
      <td colspan="6" class="text-center text-muted py-4">
          No enquiries found
      </td>
  </tr>
  @endforelse
  </tbody>
  </table>

  <!-- Pagination -->
  <div class="d-flex justify-content-end mt-3">
      {{ $data->links() }}
  </div>

  </div>
