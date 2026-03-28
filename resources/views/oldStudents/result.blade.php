  <div class="p-0 result table-responsive">
      <table class="table  bordered-table mb-0">
          <thead>
              <tr>
                  <th>
                      <div class="form-check d-flex align-items-center">
                          <input class="form-check-input oldStudentCheckbox" type="checkbox" id="selectAll">
                          <label class="form-check-label ms-2">S.L</label>
                      </div>
                  </th>
                  <th>Registration No</th>
                  <th>First Name</th>
                  <th>Last Name</th>
                  <th>Father name</th>
                  <th>Registration Date</th>
                  <th>Address</th>
                  <th>Valid Form</th>
                  <th>Course</th>
                  <th>City</th>
                  <th>Action</th>
              </tr>
          </thead>

          <tbody>
              @forelse ($data as $index => $oldStudent)
                  <tr>
                      <td>
                          <div class="form-check d-flex align-items-center">
                              <input class="form-check-input oldStudentCheckbox" type="checkbox">
                              <label class="ms-2">{{ $index + 1 }}</label>
                          </div>
                      </td>
                      <td>{{ $oldStudent->registration_no }}</td>
                      <td>
                          <div class="btn-group">
                              <button type="button" class="text-primary-light text-xl" data-bs-toggle="dropdown"
                                  data-bs-display="static" aria-expanded="false">
                                  <iconify-icon icon="tabler:dots-vertical"></iconify-icon>
                              </button>
                              <ul class="dropdown-menu dropdown-menu-lg-end border p-12">
                                  @can('edit-student-old')
                                      <li>
                                          <x-button.edit-button-component :route="route('oldStudents.edit', $oldStudent->id)" />

                                      </li>
                                  @endcan
                                  @can('delete-student-old')
                                      <li>
                                          <x-button.delete-button-component :route="route('oldStudents.destroy', $oldStudent->id)" :id="$oldStudent->id" />
                                      </li>
                                  @endcan

                              </ul>
                          </div> {{ $oldStudent->first_name }}
                      </td>
                      <td>{{ $oldStudent->last_name }}</td>
                      <td>{{ $oldStudent->father_name }}</td>
                      <td>{{ \Carbon\Carbon::parse($oldStudent->registration_date)->format('d M Y') }}
                      <td>{{ $oldStudent->address }}</td>
                      <td>{{ \Carbon\Carbon::parse($oldStudent->valid_form)->format('d M Y') }}
                      <td>{{ $oldStudent->course }}</td>
                      <td>{{ $oldStudent->city }}</td>
                      <td>
                          <div class="btn-group">
                              <button type="button" class="text-primary-light text-xl" data-bs-toggle="dropdown"
                                  data-bs-display="static" aria-expanded="false">
                                  <iconify-icon icon="tabler:dots-vertical"></iconify-icon>
                              </button>
                              <ul class="dropdown-menu dropdown-menu-lg-end border p-12">
                                  @can('edit-student-old')
                                      <li>
                                          <x-button.edit-button-component :route="route('oldStudents.edit', $oldStudent->id)" />

                                      </li>
                                  @endcan
                                  @can('delete-student-old')
                                      <li>
                                          <x-button.delete-button-component :route="route('oldStudents.destroy', $oldStudent->id)" :id="$oldStudent->id" />
                                      </li>
                                  @endcan

                              </ul>
                          </div>
                      </td>
                  </tr>
              @empty
                  <tr>
                      <td colspan="6" class="text-center text-muted py-4">
                          No students found
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
