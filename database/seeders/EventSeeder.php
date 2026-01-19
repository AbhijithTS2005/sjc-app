<?php

namespace Database\Seeders;

use App\Models\Event;
use Illuminate\Database\Seeder;
use Carbon\Carbon;

class EventSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $events = [
            [
                'title' => 'Comquest 5.0',
                'date' => '2025-12-20',
                'description' => 'Annual coding competition',
                'content' => 'Comquest 5.0 is our flagship annual coding competition where students showcase their programming prowess. Participants compete in various categories including web development, app development, and algorithm challenges. Winners receive certificates and exciting prizes.',
                'image' => 'https://images.unsplash.com/photo-1523580494863-6f3031224c94?w=400',
                'type' => 'academic',
                'status' => 'approved',
            ],
            [
                'title' => 'Annual Sports Meet',
                'date' => '2026-01-15',
                'description' => 'Inter-department sports championship',
                'content' => 'The Annual Sports Meet is a celebration of athleticism and team spirit. Teams from all departments participate in events ranging from track and field to indoor games. It fosters healthy competition and camaraderie among students.',
                'image' => 'https://images.unsplash.com/photo-1461896836934-ffe607ba8211?w=400',
                'type' => 'sports',
                'status' => 'approved',
            ],
            [
                'title' => 'Job Fair 2026',
                'date' => '2026-03-01',
                'description' => 'Placement drive with 50+ companies',
                'content' => 'Job Fair 2026 brings together leading companies and our talented students. With participation from 50+ organizations across sectors like IT, finance, and consulting, this is a prime opportunity for students to explore career prospects.',
                'image' => 'https://images.unsplash.com/photo-1521791136064-7986c2920216?w=400',
                'type' => 'placement',
                'status' => 'approved',
            ],
            [
                'title' => 'Research Symposium 2024',
                'date' => '2024-11-20',
                'description' => 'Faculty and student research presentations',
                'content' => 'The Research Symposium showcases innovative research work by faculty members and postgraduate students. Topics cover fields like artificial intelligence, biotechnology, renewable energy, and social sciences.',
                'image' => 'https://images.unsplash.com/photo-1552664730-d307ca884978?w=400',
                'type' => 'academic',
                'status' => 'approved',
            ],
            [
                'title' => 'Cultural Week 2024',
                'date' => '2024-10-15',
                'description' => 'Music, dance, and theater performances',
                'content' => 'Cultural Week is a vibrant celebration of artistic talent. Students display their creativity through classical and contemporary music performances, classical and modern dance forms, and theater presentations.',
                'image' => 'https://images.unsplash.com/photo-1501575334519-ab3f30f5e7f8?w=400',
                'type' => 'cultural',
                'status' => 'approved',
            ],
            [
                'title' => 'Alumni Reunion 2024',
                'date' => '2024-09-10',
                'description' => 'Gathering of alumni from past decades',
                'content' => 'The Alumni Reunion brings together graduates from different batches to reconnect and celebrate their college days. Distinguished alumni share their career journeys and success stories with current students.',
                'image' => 'https://images.unsplash.com/photo-1529156069898-49953e39b3ac?w=400',
                'type' => 'social',
                'status' => 'approved',
            ],
            [
                'title' => 'Workshop on AI & ML',
                'date' => '2024-08-25',
                'description' => 'Industrial training by expert professionals',
                'content' => 'This intensive workshop on Artificial Intelligence and Machine Learning is conducted by industry experts. Participants gain hands-on experience with popular ML frameworks and real-world applications.',
                'image' => 'https://images.unsplash.com/photo-1517245386807-bb43f82c33c4?w=400',
                'type' => 'academic',
                'status' => 'approved',
            ],
            [
                'title' => 'Environment Day Celebration',
                'date' => '2024-06-05',
                'description' => 'Tree plantation and sustainability drive',
                'content' => 'On Environment Day, our college commits to sustainability through tree plantation drives and awareness programs. Students and staff work together to make the campus greener and promote ecological conservation.',
                'image' => 'https://images.unsplash.com/photo-1441974231531-c6227db76b6e?w=400',
                'type' => 'social',
                'status' => 'approved',
            ],
            [
                'title' => 'Women Empowerment Talk',
                'date' => '2024-03-08',
                'description' => 'Session on women in leadership',
                'content' => 'This special session features successful women leaders and entrepreneurs who share their experiences and insights on overcoming challenges and achieving excellence in their respective fields.',
                'image' => 'https://images.unsplash.com/photo-1524178232363-1fb2b075b655?w=400',
                'type' => 'social',
                'status' => 'approved',
            ],
            [
                'title' => 'Inter-College Debate',
                'date' => '2023-12-18',
                'description' => 'Competitive debate championship',
                'content' => 'Our college hosts an inter-college debate championship where teams from multiple institutions compete on contemporary and socially relevant topics. It tests oratory skills and critical thinking abilities.',
                'image' => 'https://images.unsplash.com/photo-1552664730-d307ca884978?w=400',
                'type' => 'academic',
                'status' => 'approved',
            ],
            [
                'title' => 'Science Expo 2023',
                'date' => '2023-11-02',
                'description' => 'Student science projects exhibition',
                'content' => 'The Science Expo is a platform for science and engineering students to display their innovative projects and research work. Projects cover diverse areas including renewable energy, robotics, and environmental science.',
                'image' => 'https://images.unsplash.com/photo-1571902943202-507ec2618e8f?w=400',
                'type' => 'academic',
                'status' => 'approved',
            ],
            [
                'title' => 'Annual Fest 2023',
                'date' => '2023-10-20',
                'description' => 'Three-day cultural extravaganza',
                'content' => 'The Annual Fest is a three-day extravaganza featuring cultural performances, competitions, exhibitions, and entertainment. It brings together the entire college community in celebration of talent and creativity.',
                'image' => 'https://images.unsplash.com/photo-1501575334519-ab3f30f5e7f8?w=400',
                'type' => 'cultural',
                'status' => 'approved',
            ],
            [
                'title' => 'Sports Intramurals 2023',
                'date' => '2023-09-15',
                'description' => 'Department-wise sports competitions',
                'content' => 'Intramural sports competitions promote fitness and team bonding within departments. Events include cricket, volleyball, badminton, chess, and other sports across different categories.',
                'image' => 'https://images.unsplash.com/photo-1461896836934-ffe607ba8211?w=400',
                'type' => 'sports',
                'status' => 'approved',
            ],
            [
                'title' => 'NSS Community Service',
                'date' => '2023-08-10',
                'description' => 'Village development project',
                'content' => 'The NSS unit of our college conducts community service programs in surrounding villages. Activities include skill development workshops, health camps, and infrastructure improvement projects.',
                'image' => 'https://images.unsplash.com/photo-1559027615-cd4628902d4a?w=400',
                'type' => 'social',
                'status' => 'approved',
            ],
            [
                'title' => 'Faculty Development Program',
                'date' => '2023-07-22',
                'description' => 'Training on modern teaching methods',
                'content' => 'Faculty members participate in continuous professional development programs focusing on innovative teaching methodologies, use of technology in education, and curriculum development.',
                'image' => 'https://images.unsplash.com/photo-1552664730-d307ca884978?w=400',
                'type' => 'academic',
                'status' => 'approved',
            ],
        ];

        foreach ($events as $eventData) {
            Event::create($eventData);
        }
    }
}
