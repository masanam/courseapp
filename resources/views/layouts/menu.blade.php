<li class="nav-item">
      <a class="nav-link" data-toggle="collapse" href="#website-ui" aria-controls="website-ui">
        <i class="menu-icon mdi mdi-dna"></i>
        <span class="menu-title">Website Contents</span>
        <i class="menu-arrow"></i>
      </a>
      <div class="collapse" id="website-ui">
        <ul class="nav flex-column sub-menu">
        <li class="nav-item">
            <a href="{{ route('admin.menus.index') }}"
              class="nav-link {{ Request::is('admin/menus*') ? 'active' : '' }}">
                <span class="menu-title">Menus</span>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ route('admin.sliders.index') }}"
              class="nav-link {{ Request::is('admin/sliders*') ? 'active' : '' }}">
                <span class="menu-title">Sliders</span>
            </a>
        </li>
        <li class="nav-item">
          <a href="{{ route('admin.features.index') }}"
            class="nav-link {{ Request::is('admin/features*') ? 'active' : '' }}">
              <span class="menu-title">Features</span>
          </a>
      </li>
      <li class="nav-item">
              <a href="{{ route('admin.categories.index') }}"
                class="nav-link {{ Request::is('admin/categories*') ? 'active' : '' }}">
                  <span class="menu-title">Categories</span>
              </a>
          </li>


          <li class="nav-item">
              <a href="{{ route('admin.testimonies.index') }}"
                class="nav-link {{ Request::is('admin/testimonies*') ? 'active' : '' }}">
                  <span class="menu-title">Testimonies</span>
              </a>
          </li>


          <li class="nav-item">
              <a href="{{ route('admin.sections.index') }}"
                class="nav-link {{ Request::is('admin/sections*') ? 'active' : '' }}">
                  <span class="menu-title">Sections</span>
              </a>
          </li>
          <li class="nav-item">
              <a href="{{ route('admin.faqs.index') }}"
                class="nav-link {{ Request::is('admin/faqs*') ? 'active' : '' }}">
                  <span class="menu-title">Faqs</span>
              </a>
          </li>


          <li class="nav-item">
              <a href="{{ route('admin.achievements.index') }}"
                class="nav-link {{ Request::is('admin/achievements*') ? 'active' : '' }}">
                  <span class="menu-title">Achievements</span>
              </a>
          </li>
          </ul>
      </div>
    </li>

  <li class="nav-item">
      <a class="nav-link" data-toggle="collapse" href="#sylabus-ui" aria-controls="sylabus-ui">
        <i class="menu-icon mdi mdi-dna"></i>
        <span class="menu-title">Curriculum</span>
        <i class="menu-arrow"></i>
      </a>
      <div class="collapse" id="sylabus-ui">
        <ul class="nav flex-column sub-menu">

        <li class="nav-item">
            <a class="nav-link" href="{{ url('/website-ui/typography') }}">Sylabus</a>
          </li>
          <li class="nav-item">
            <a href="{{ route('admin.levels.index') }}"
              class="nav-link {{ Request::is('admin/levels*') ? 'active' : '' }}">
                <span class="menu-title">Levels</span>
            </a>
        </li>

          <li class="nav-item">
              <a href="{{ route('admin.grades.index') }}"
                class="nav-link {{ Request::is('admin/grades*') ? 'active' : '' }}">
                  <span class="menu-title">Grades</span>
              </a>
          </li>
          <li class="nav-item">
              <a href="{{ route('admin.subjects.index') }}"
                class="nav-link {{ Request::is('admin/subjects*') ? 'active' : '' }}">
                  <span class="menu-title">Subjects</span>
              </a>
          </li>

          <li class="nav-item">
              <a href="{{ route('admin.topics.index') }}"
                class="nav-link {{ Request::is('admin/topics*') ? 'active' : '' }}">
                  <span class="menu-title">Topics</span>
              </a>
          </li>


            <li class="nav-item">
                <a href="{{ route('admin.subtopics.index') }}"
                  class="nav-link {{ Request::is('admin/subtopics*') ? 'active' : '' }}">
                    <span class="menu-title">Subtopics</span>
                </a>
            </li>

              <li class="nav-item">
                  <a href="{{ route('admin.problems.index') }}"
                    class="nav-link {{ Request::is('admin/problems*') ? 'active' : '' }}">
                      <span class="menu-title">Problems</span>
                  </a>
              </li>
        </ul>
      </div>
    </li>

    <li class="nav-item">
      <a class="nav-link" data-toggle="collapse" href="#member-ui" aria-controls="member-ui">
        <i class="menu-icon mdi mdi-dna"></i>
        <span class="menu-title">Members</span>
        <i class="menu-arrow"></i>
      </a>
      <div class="collapse" id="member-ui">
        <ul class="nav flex-column sub-menu">
        <li class="nav-item">
            <a class="nav-link" href="{{ url('/member-ui/buttons') }}">Parents</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{ url('/member-ui/dropdowns') }}">Students</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{ url('/member-ui/typography') }}">Attendances</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{ url('/member-ui/typography') }}">Exams</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{ url('/member-ui/typography') }}">Results</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{ url('/member-ui/typography') }}">Certificates</a>
          </li>
        </ul>
      </div>
    </li>



<li class="nav-item">
      <a class="nav-link" data-toggle="collapse" href="#accounts" aria-controls="accounts">
        <i class="menu-icon mdi mdi-dna"></i>
        <span class="menu-title">Accounts</span>
        <i class="menu-arrow"></i>
      </a>
      <div class="collapse" id="accounts">
        <ul class="nav flex-column sub-menu">
        <li class="nav-item">
            <a href="{{ route('admin.users.index') }}" class="nav-link active">
                <span class="menu-title">Users</span>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ route('admin.userTypes.index') }}"
              class="nav-link {{ Request::is('admin/userTypes*') ? 'active' : '' }}">
                <span class="menu-title">User Types</span>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ route('admin.roles.index') }}"
              class="nav-link {{ Request::is('admin/roles*') ? 'active' : '' }}">
                <span class="menu-title">Roles</span>
            </a>
        </li>

        <li class="nav-item">
            <a href="{{ route('admin.permissions.index') }}"
              class="nav-link {{ Request::is('admin/permissions*') ? 'active' : '' }}">
                <span class="menu-title">Permissions</span>
            </a>
        </li>
        </ul>
      </div>
    </li>

<li class="nav-item">
    <a href="{{ route('logout') }}" class="nav-link">
    <i class="menu-icon mdi mdi-dna"></i>
        <span class="menu-title">Logout</span>
    </a>
</li>



